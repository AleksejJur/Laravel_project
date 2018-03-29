<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Services\PhotoService;

class CategoryController extends Controller
{
    protected $photoService;

    public function __construct(PhotoService $photoService)
    {
        $this->photoService = $photoService;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();
    
        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            $this->photoService->add($file, $category);
        }

        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        $products = $category->products;

        return view('categories.show', ['category' => $category, 'products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validate
        $request->validate([
            'title' => 'required|min:3',
            'content' => 'required',
            'photoForCategory' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $category = Category::findOrFail($id);
        $category->title = $request->title;
        $category->content = $request->content;
        $category->save();

        if($request->hasFile('photoForCategory')) {
            $file = $request->file('photoForCategory');
            $this->photoService->update($file, $category);
        }
        $request->session()->flash('message', 'Successfully modified the category!');
        return redirect('/categories');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Product  $product
         * @return \Illuminate\Http\Response
         */
        public function destroy(Request $request, $id)
        {
            //delete
            $category = Category::FindOrFail($id);
            $category->products()->sync([]);
            $this->photoService->delete($category);
            $category->delete();

            //redirect
            $request->session()->flash('message', 'Successfully deleted the category!');
            return redirect('/categories');
        }
}
