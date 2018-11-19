<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function getEdit()
    {	
    	$user = Auth::user();
    	$active_sidebar = 'active';
        return view('admin.edit', compact('user'))->with('p',$active_sidebar);
    }

    public function postEdit(Request $request)
    {
    	$request->validate(
            [
                'username' => 'required|max:25|min:6|unique:user,username',
                'fullname' => 'required|unique:user,name|max:255',
                'email' => 'required|email|max:25|unique:user,email',
                'phone' => 'required',
                'address' => 'required',
            ],
            [
                'username.required' => 'Yêu cầu nhập tài khoản.',
                'username.unique' => 'Tài khoản đã tồn tại.',
                'fullname.required' => 'Yêu cầu nhập tên.',
                'fullname.unique' => 'Tên đã tồn tại.',
                'email.required' => 'Yêu cầu nhập email.',
                'email.unique' => 'Email đã tồn tại.',
                'phone.required' => 'Yêu cầu nhập số điện thoại',
                'address.required' => 'Yêu cầu nhập địa chỉ',
            ]
        );
        $user = User::where('id', Auth::user()->id)->update([
            'name' => $request->fullname,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'username' => $request->username,
        ]);
        return back()->with('status', 'Profile updated successful');
    }
}
