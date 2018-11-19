<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
	public function index()
	{
		$categories = Category::all();
		return view('categories.index', compact('categories'));
	}
    public function getAdd()
    {
    	return view('categories.create');
    }

    public function postAdd(Request $request)
    {
    	$request->validate(
            [
                'name' => 'required|unique:categories,name|max:255',
                'description' => 'required',
            ],
            [
                'name.required' => 'Yêu cầu nhập tên.',
                'name.unique' => 'Tên đã tồn tại.',
                'description.required' => 'Yêu cầu nhập mô tả',
            ]
        );
        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return back()->with('status','Create successful.');
	}
	public function getEdit($id)
    {
    	$data =  Category::findOrFail($id);
        return view('categories.edit', compact('data'));
    }

    public function postEdit(Request $request, $id)
    {
    	$request->validate(
            [
                'name' => 'required|max:255',
                'description' => 'required',
            ],
            [
                'name.required' => 'Yêu cầu nhập tên.',
                'description.required' => 'Yêu cầu nhập mô tả',
            ]
        );
        $category = Category::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return back()->with('status','Update successful.');
	}
}
