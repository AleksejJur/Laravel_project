<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Order;
use App\Product;
use App\Service;
use App\User;

class SearchController extends Controller
{   
    public function searchList(Request $request)
    {
        if($request->has('search')) {
            $users = User::search($request->search)->take(10)->get();
            $orders = Order::search($request->search)->take(10)->get();
            $categories = Category::search($request->search)->take(10)->get();
            $products = Product::search($request->search)->take(10)->get();
            $services = Service::search($request->search)->take(10)->get();
        }
        return view('searchList',compact('categories', 'orders', 'products', 'services', 'users'));
    }
}
