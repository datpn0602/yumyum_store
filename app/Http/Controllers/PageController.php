<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use App\FoodType;
use App\Category;
use App\FoodDetail;
use App\User;
use App\Order;
use App\OrderFood;
use App\Review;
use App\Comment;
use Auth;
use Cart;

class PageController extends Controller
{
    public function index()
    {
        //$categories = Category::first();
        $sale_product = Food::where('promotion_id', '<>', 'NULL')->paginate(8);
        $featured_product = Food::where('rating', 100)->get();
        $pizza_product = Food::where('type_id', 1)->get();
        $new_product = Food::orderBy('id', 'DESC')->offset(0)->limit(8)->get();
        return view('client.pages.index', compact(
            'sale_product',
            'pizza_product',
            'featured_product',
            'new_product'
        ));
    }

    public function getType($id)
    {
        $type_product = Food::where('type_id', $id)->paginate(9);
        $type_name = FoodType::where('id', $id)->first();
        $types = FoodType::all();
        return view('client.pages.categories', compact(
            'type_product',
            'types',
            'type_name'
        ));
    }

    public function getList($id)
    {
        $type_product = Food::where('type_id', $id)->paginate(5);
        $type_name = FoodType::where('id', $id)->first();
        $types = FoodType::all();
        return view('client.pages.list', compact(
            'type_product',
            'types',
            'type_name'
        ));
    }

    public function getProductDetail($id)
    {
        $product_detail = Food::where('id', $id)->first();
        $related_product = Food::where('id', '<>', $id)
                                ->where('type_id', '=', $product_detail->type_id)
                                ->get();
        $image_detail = FoodDetail::where('food_id', $id)->get();
        $comment = Comment::where('food_id', $id)->get();
        $reviews = Review::where('food_id', $id)->get();
        $rating = count($reviews);
        $total = 0;
        $rate = " ";
        if($rating != 0) {
            foreach($reviews as $review) {
                $total += $review->rating;
            }
            $rate = round($total/$rating, 2)*100/5;
            $foods = Food::where('id', $id)->select('rating')->update([
                'rating' => $rate,
            ]);
        }
        $rate = (float)$rate;
        return view('client.pages.food_details', compact(
            'product_detail',
            'image_detail',
            'related_product',
            'comment',
            'rate',
            'rating'
        ));
    }

    public function getProductSearch(Request $request)
    {
        $key = str_replace(' ', '%', $request->search);
        $search_product = Food::where('name', 'like', '%'. $key.'%')->paginate(9);
        $types = FoodType::all();
        return view('client.pages.search', compact(
            'search_product',
            'types'
        ));
    }

    public function getRegister()
    {
        return view('client.pages.register');
    }

    public function postRegister(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:255',
                'username' => 'required|unique:users,username|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:20',
                'confirm_password' => 'required|same:password',
                'phone' => 'required',
            ],
            [
                'name.required' => 'Yêu cầu nhập tên.',
                'username.required' => 'Yêu cầu nhập tài khoản',
                'username.unique' => 'Tài khoản đã tồn tại',
                'email.required' => 'Yêu cầu nhập email',
                'email.unique' => 'Email đã tồn tại',
                'password.required' => 'Yêu cầu nhập mật khẩu',
                'confirm_password.required' => 'Yêu cầu nhập lại mật khẩu',
                'confirm_password.same' => 'Mật khẩu không giống nhau',
                'password.min' => 'Mật khẩu quá ngắn',
                'phone.required' => 'Yêu cầu nhập số điện thoại',
            ]
        );
        $users = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'confirm_password' => bcrypt($request->confirm_password),
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'level' => 3,
        ]);
        return redirect()->route('user.getLogin')->with('status', 'Create successful');
    }

    public function getLogin()
    {
        return view('client.pages.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:6|max:20',
            ],
            [
                'email.required' => 'Yêu cầu nhập email',
                'email.email' => 'Email không đúng định dạng',
                'password.required' => 'Yêu cầu nhập mật khẩu',
            ]
        );
        $login = array('email' => $request->email, 'password' => $request->password);
        if(Auth::attempt($login)) {
            return back()->with(['flag' => 'success', 'notice' => 'Login successful!']);
        } else {
            return back()->with(['flag' => 'danger', 'notice' => 'Login unsuccessful!']);
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function getOrderFood($id)
    {
        $product_cart = Food::where('id', $id)->first();
        Cart::add([
            'id' => $id,
            'name' => $product_cart->name,
            'qty' => 1,
            'price' => $product_cart->price,
            'options' => [
                'img' => $product_cart->image,
                'size' => $product_cart->size,
                'promotion' => isset($product_cart->promotion->discount) ? $product_cart->promotion->discount : null,
            ],
        ]);
        return redirect()->route('shop-cart');
    }

    public function getShopCart()
    {
        $content = Cart::content();
        $total = Cart::subtotal();
        return view('client.pages.cart', compact('content', 'total'));
    }

    public function getDeleteFoodInCart($id)
    {
        Cart::remove($id);
        return redirect()->route('shop-cart');
    }

    public function getUpdateCart(Request $request)
    {
        Cart::update(
            $request->rowId,
            $request->qty
        );
    }

    public function getCheckout()
    {
        $total = Cart::subtotal();
        return view('client.pages.payment', compact('total'));
    }

    public function postCheckout(Request $request)
    {
        $content = Cart::content();
        $request->validate(
            [
                'name' => 'required|max:255',
                'phone' => 'required',
                'address' => 'required|max:255',
            ],
            [
                'name.required' => 'Yêu cầu nhập đầy đủ tên.',
                'phone.required' => 'Yêu cầu nhập số điện thoại',
                'address.required' => 'Yêu cầu nhập địa chỉ',
            ]
        );
        $order = Order::create([
            'full_name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'description' => $request->description,
            'date' => date('Y-m-d'),
            'user_id' => isset(Auth::user()->id) ? Auth::user()->id : null,
            'store_id' => 1,
        ]);
        foreach($content as $item) {
            $order_food = OrderFood::create([
                'quantity' => $item->qty,
                'price' => $item->price,
                'food_id' => $item->id,
                'order_id' => $order->id,
            ]);
        }
        Cart::destroy();
        return redirect()->back()->with('status', 'Order successful'); 
    }

    public function getReview($id)
    {
        return view('client.pages.food_details');
    }

    public function postReview(Request $request, $id)
    {
        if(Auth::check()) {
            $review = Review::create([
                'rating' => $request->rating,
                'food_id' => $id,
                'user_id' => Auth::user()->id,
            ]);
            $comment = Comment::where('food_id', $id)->create([
                'content' => $request->comment,
                'date' => date('Y-m-d'),
                'food_id' => $id,
                'user_id' => Auth::user()->id,
            ]);
            return redirect()->route('food-detail', $id);
        } else {
            return redirect()->route('user.getLogin')->with(['flag' => 'danger', 'notice' => 'Yêu cầu bạn đăng nhập để bình luận và đánh giá']);
        }  
    }

    public function getHistoryOrder() 
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return view('client.pages.history_orders', compact('orders'));
    }

    public function getHistoryOrderDetail($id) 
    {
        $order_detail = OrderFood::where('order_id', $id)->get();
        $total = 0;
        foreach($order_detail as $detail) {
            if(isset($detail->food->promotion->discount)) {
                $total += $detail->quantity*$detail->price*(100-$detail->food->promotion->discount)/100;
            } else {
                $total += $detail->quantity*$detail->price;
            }
        }
        return view('client.pages.history_order_detail', compact('order_detail', 'total'));
    }

    public function getDelete($id)
    {
        $order = Order::find($id);
        $status = Order::where('id', $id)->select('status')->update([
            'status' => 3,
        ]);
        return redirect()->route('getHistoryOrder');
    }
}
