<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::all();
        return view('stores.index', compact('stores'));
    }

    public function getAdd()
    {
        return view('stores.create');
    }

    public function postAdd(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:stores,name|max:255',
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'phone' => 'required',
                'address' => 'required',
            ],
            [
                'name.required' => 'Yêu cầu nhập tên.',
                'name.unique' => 'Tên đã tồn tại.',
                'phone.required' => 'Yêu cầu nhập số điện thoại',
                'address.required' => 'Yêu cầu nhập số điện thoại',
                'avatar.required' => 'Yêu cầu chọn ảnh',
                'avatar.mimes' => 'Ảnh phải có đuôi là jpeg, png, gif, svg',
            ]
        );
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $file->move(config('image.paths.resource'), $file->getClientOriginalName());
            $store = Store::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'description' => $request->description,
                'avatar' => $file->getClientOriginalName(),
                'workspace_id' => 1,
            ]);
            return redirect()->route('index')->with('success','Create successful.');
        }
    }

    public function getEdit($id)
    {
        $data =  Store::findOrFail($id);
        return view('stores.edit', compact('data'));
    }

    public function postEdit(Request $request, $id)
    {
         $request->validate(
            [
                'name' => 'required|max:255',
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'phone' => 'required',
                'address' => 'required',
            ],
            [
                'name.required' => 'Yêu cầu nhập tên.',
                'phone.required' => 'Yêu cầu nhập số điện thoại',
                'address.required' => 'Yêu cầu nhập số điện thoại',
                'avatar.mimes' => 'Ảnh phải có đuôi là jpeg, png, gif, svg',
                'avatar.required' => 'Yêu cầu chọn ảnh',
            ]
        );
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $file->move(config('image.paths.resource'), $file->getClientOriginalName());
            $store = Store::where('id', $id)->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'description' => $request->description,
                'avatar' => $file->getClientOriginalName(),
                'workspace_id' => 1,
            ]);
            return back()->with('status', 'Store updated successful');
        }
    }
}