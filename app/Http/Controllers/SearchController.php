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
    public function search($searchKey)
    {
        $categories = Category::search($searchKey)->get();  
        $orders = Order::search($searchKey)->get();
        $products = Product::search($searchKey)->get();
        $services = Service::search($searchKey)->get();
        $users = User::search($searchKey)->get();

        return view('search', compact('categories', 'orders', 'products', 'services', 'users'));
    }
}
