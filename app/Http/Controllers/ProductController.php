<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;
use App\Services\PhotoService;
use Photo;

class ProductController extends Controller
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
        $products = Product::all();
        $order_id = $request->order_id;

        return view('products.index',compact('products',$products), ['order_id' => $order_id]);
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
            'photoForProduct.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        
        $product = Product::create([
                                    'title' => $request->title,
                                    'price' => $request->price, 
                                    'description' => $request->description,
                                    'size' => $request->size, 
                                    'manufacturer' => $request->manufacturer,
                                    'material' => $request->material
                                    ]);

        $product -> categories()->attach($request -> category);

        // Storing Photo for product

        if($request->hasFile('photoForProduct')) {
            $files = $request->file('photoForProduct');
                foreach ($files as $file) {
                    $this->photoService->add($file, $product);
                }
        }

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

        $product -> categories()->sync($request -> category);
        
        $product->title = $request->title;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->size = $request->size;
        $product->manufacturer = $request->manufacturer;
        $product->material = $request->material;
        $product->save();

        if($request->hasFile('photoForProduct')) {
            $files = $request->file('photoForProduct');
            foreach ($files as $file)
            {
                $this->photoService->add($file, $product);
            }
            
        }
        if ($request->has('file'))
        {
            $this->photoService->deleteSome($request->file);
        }
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        if ($product->orderItems->count() > 0 ) {   
            $request->session()->flash('message.content', 'You cant delete because product is used in order.');
            return redirect('/products');
        } else {
            $product->categories()->sync([]);
            $this->photoService->delete($product);
            $product->delete();
            return redirect('/products');
        }
    }
}
