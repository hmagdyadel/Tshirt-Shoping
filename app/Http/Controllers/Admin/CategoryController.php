<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $category =Category::all();
        return view('Admin.category.index', compact('category'));
    }

    public function create()
    {
        return view('Admin.category.create');
    }
    public function edit(Category $cat)
    {

        return view('Admin.category.edit', compact('cat'));
    }

    public function update(Request $request, Category $cat)
    {
        $this->validate($request,[
            'name'=>'required|max:50|unique:categories'
        ]);
        $cat->name = $request->name;
        $cat->save();

        return redirect()->route('admin.category.index');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:50|unique:categories'
        ]);
        $cat=new Category();
        $cat->name=$request->name;
        $cat->save();

        return redirect()->route('admin.category.index');
    }
    public function destroy(Category $cat)
    {
        $cat->delete();
        return redirect()->route('admin.category.index');

    }
}
