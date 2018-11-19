<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'],function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', 'StoreController@index')->name('index');
        Route::group(['prefix' => 'store'], function () {
            Route::get('create', 'StoreController@getAdd')->name('store.getAdd');
            Route::post('create', 'StoreController@postAdd')->name('store.postAdd');
            Route::get('edit/{id?}', 'StoreController@getEdit')->name('store.getEdit');
            Route::post('edit/{id?}', 'StoreController@postEdit')->name('store.postEdit');
        });
        Route::get('profile', 'UserController@getEdit')->name('profile.getEdit');
        Route::post('profile', 'UserController@postEdit')->name('profile.postEdit');
    });
});

Route::get('/workspace/{name?}', function ($name) {
    return view('workspace.index', compact('name'));
})->name('workspace.index');
Route::get('food/list', 'FoodController@index')->name('food.index');
Route::get('food/create', 'FoodController@getAdd')->name('food.getAdd');
Route::post('food/create', 'FoodController@postAdd')->name('food.postAdd');
Route::get('food/edit/{id?}', 'FoodController@getEdit')->name('food.getEdit');
Route::post('food/edit/{id?}', 'FoodController@postEdit')->name('food.postEdit');
Route::get('food/delete/{id?}', 'FoodController@getDelete')->name('food.getDelete');

Route::get('category/list', 'CategoryController@index')->name('category.index');
Route::get('category/create', 'CategoryController@getAdd')->name('category.getAdd');
Route::post('category/create', 'CategoryController@postAdd')->name('category.postAdd');
Route::get('category/edit/{id?}', 'CategoryController@getEdit')->name('category.getEdit');
Route::post('category/edit/{id?}', 'CategoryController@postEdit')->name('category.postEdit');

Route::get('type/list', 'TypeController@index')->name('type.index');
Route::get('type/create', 'TypeController@getAdd')->name('type.getAdd');
Route::post('type/create', 'TypeController@postAdd')->name('type.postAdd');
Route::get('type/edit/{id?}', 'TypeController@getEdit')->name('type.getEdit');
Route::post('type/edit/{id?}', 'TypeController@postEdit')->name('type.postEdit');
Route::get('type/delete/{id?}', 'TypeController@getDelete')->name('type.getDelete');

Route::get('promotion/list', 'PromotionController@index')->name('promotion.index');
Route::get('promotion/create', 'PromotionController@getAdd')->name('promotion.getAdd');
Route::post('promotion/create', 'PromotionController@postAdd')->name('promotion.postAdd');
Route::get('promotion/edit/{id?}', 'PromotionController@getEdit')->name('promotion.getEdit');
Route::post('promotion/edit/{id?}', 'PromotionController@postEdit')->name('promotion.postEdit');
Route::get('promotion/delete/{id?}', 'PromotionController@getDelete')->name('promotion.getDelete');

Route::get('user/list', 'MemberController@index')->name('user.index');
Route::get('user/edit/{id?}', 'MemberController@getEdit')->name('user.getEdit');
Route::post('user/edit/{id?}', 'MemberController@postEdit')->name('user.postEdit');

Route::get('order/list', 'OrderController@index')->name('order.index');
Route::get('order/detail/{id?}', 'OrderController@getDetail')->name('order.getDetail');
Route::get('order/edit/{id?}', 'OrderController@getEdit')->name('order.getEdit');
Route::post('order/edit/{id?}', 'OrderController@postEdit')->name('order.postEdit');
Route::get('order/handling/{id?}', 'OrderController@getHandle')->name('order.getHandle');
Route::post('order/handling/{id?}', 'OrderController@postHandle')->name('order.postHandle');

Route::get('/', 'PageController@index')->name('home');
Route::get('about', function () {
    return view('client.pages.about');
})->name('about');
Route::get('contact', function () {
    return view('client.pages.contact');
})->name('contact');
Route::get('/', 'PageController@index')->name('home');
Route::get('food-type/{id?}', 'PageController@getType')->name('food-type');
Route::get('food-list/{id?}', 'PageController@getList')->name('food-list');
Route::get('food-detail/{id?}', 'PageController@getProductDetail')->name('food-detail');
Route::get('search', 'PageController@getProductSearch')->name('search');

Route::get('user-register', 'PageController@getRegister')->name('user.getRegister');
Route::post('user-register', 'PageController@postRegister')->name('user.postRegister');
Route::get('user-login', 'PageController@getLogin')->name('user.getLogin');
Route::post('user-login', 'PageController@postLogin')->name('user.postLogin');
Route::get('user-logout', 'PageController@getLogout')->name('user.getLogout');

Route::get('order-food/{id}/{name}', 'PageController@getOrderFood')->name('order-food');
Route::get('shop-cart', 'PageController@getShopCart')->name('shop-cart');
Route::get('delete-food-in-cart/{id}', 'PageController@getDeleteFoodInCart')->name('delete-food-in-cart');
Route::get('update-cart', 'PageController@getUpdateCart')->name('update-cart');
Route::get('checkout-cart', 'PageController@getCheckout')->name('checkout.getCheckout');
Route::post('checkout-cart', 'PageController@postCheckout')->name('checkout.postCheckout');

Route::get('review/{id?}', 'PageController@getReview')->name('review.getReview');
Route::post('review/{id?}', 'PageController@postReview')->name('review.postReview');

Route::get('history-order', 'PageController@getHistoryOrder')->name('getHistoryOrder');
Route::get('history-order-detail/{id?}', 'PageController@getHistoryOrderDetail')->name('getHistoryOrderDetail');
Route::get('history-order-delete/{id?}', 'PageController@getDelete')->name('getDelete');

Route::get('test', function () {
    event(new App\Events\Notifications('Guest'));
    return "Event has been sent!";
});



