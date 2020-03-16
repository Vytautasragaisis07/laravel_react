<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function AddCateg()
    {
        return view('shop.pages.add-category');
    }

    public function storeCateg(Request $request )
    {

        $validateData = $request->validate([
            'category' => 'required'
        ]);
        $category = Category::create([
            'id' => request('id'),
            'category' => request('category'),
        ]);

        return redirect('/control-category');
    }


    public function ControlCateg()
    {
        $categories = Category::all();
        return view('shop.pages.control-category',compact('categories')); //psl
    }

    public function warningCateg(Category $category)
    {

        return view('shop.pages.warning-category',compact('category'));
    }

    public function deleteCateg(Category $category)
    {
        $category->delete();
        return redirect('/control-category');
    }


}
