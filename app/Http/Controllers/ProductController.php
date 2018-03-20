<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index',compact('products',$products));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', ['categories' => $categories]);
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
            'price' => 'required',
            'description' => 'required',
            'size' => 'required',
            'manufacturer' => 'required',
            'material' => 'required',
        ]);
        
        $product = Product::create(['title' => $request->title, 'price' => $request->price, 
                                    'description' => $request->description, 'size' => $request->size, 
                                    'manufacturer' => $request->manufacturer, 'material' => $request->material
                                    ]);

        $product -> categories()->attach($request -> category);
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product',$product));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit',compact('product',$product), ['categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //Validate
        $request->validate([
            'title' => 'required|min:3',
            'price' => 'required',
            'description' => 'required',
            'size' => 'required',
            'manufacturer' => 'required',
            'material' => 'required',
        ]);

        $product -> categories()->attach($request -> category);
        
        $product->title = $request->title;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->size = $request->size;
        $product->manufacturer = $request->manufacturer;
        $product->material = $request->material;
        $product->save();
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products');
    }
}
