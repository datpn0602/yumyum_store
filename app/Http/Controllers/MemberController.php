<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class MemberController extends Controller
{
    public function index()
    {
         $members = User::all();
         return view('users.index', compact('members'));
    }

    public function getEdit($id)
    {	
    	$data = User::findOrFail($id);
        return view('users.edit', compact('data'));
    }

    public function postEdit(Request $request, $id)
    {
    	$request->validate(
            [
                'username' => 'required|max:25|min:6',
                'name' => 'required|max:255',
                'email' => 'required|email|max:25',
                'phone' => 'required',
                'address' => 'required',
            ],
            [
                'username.required' => 'Yêu cầu nhập tài khoản.',
                'name.required' => 'Yêu cầu nhập tên.',
                'email.required' => 'Yêu cầu nhập email.',
                'phone.required' => 'Yêu cầu nhập số điện thoại',
                'address.required' => 'Yêu cầu nhập địa chỉ',
            ]
        );
        $user = User::where('id', $id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'username' => $request->username,
        ]);
        return back()->with('status', 'Profile updated successful');
    }
}
