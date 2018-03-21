<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Services\PhotoService;

class CategoryController extends Controller
{
    public function index()
    {
        //get all the categories
        $categories = Category::all();

        return view('categories.categories', ['categories' => $categories]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function show($id)
    {   
        $category = Category::findOrFail($id);

        $products = $category->products;

        return view('categories.category', ['category' => $category, 'products' => $products]);
    }

    public function store(Request $request)
    {
        //Validate
        $request->validate([
            'title' => 'required|min:3',
            'content' => 'required',
            'photoForCategory' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        
        $category = Category::create(['title' => $request->title,'content' => $request->content]);
        
        // Storing Photo for Category

        if($request->hasFile('photoForCategory')) {
            $file = $request->file('photoForCategory');
            $PhotoService = new PhotoService;
            $PhotoService->add($file, $category);
        }

        return redirect('/categories');

    }

    public function edit($id) // WITH $ID
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        //Validate
        $request->validate([
            'title' => 'required|min:3',
            'content' => 'required',
        ]);

        $category = Category::findOrFail($id);
        $category->title = $request->title;
        $category->content = $request->content;
        $category->save();
        $request->session()->flash('message', 'Successfully modified the category!');
        return redirect('/categories');
    }

    public function delete(Request $request, $id)
    {
        //delete
        
        $category = Category::findOrFail($id);
        $category->products()->sync([]);
        $category->photos()->delete();
        $category->delete();

        //redirect
        $request->session()->flash('message', 'Successfully deleted the category!');
        return redirect('/categories');
    }
}
