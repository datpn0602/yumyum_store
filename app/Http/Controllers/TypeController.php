<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FoodType;

class TypeController extends Controller
{
    public function index()
	{
		$types = FoodType::all();
		return view('types.index', compact('types'));
	}
    public function getAdd()
    {
    	return view('types.create');
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
        $type = FoodType::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return back()->with('status','Create successful.');
	}
	public function getEdit($id)
    {
    	$data = FoodType::findOrFail($id);
        return view('types.edit', compact('data'));
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
        $type = FoodType::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return back()->with('status','Update successful.');
	}

    public function getDelete($id)
    {
        $type = FoodType::findOrFail($id);
        $type->delete($id);
        return redirect()->route('type.index')->with('status','Delete successful.');
    }
}
