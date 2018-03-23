<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Service;
use App\Services\PhotoService;

class OrderController extends Controller
{
    
    public function index()
    {
        
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        return redirect('/orders');
    }

    public function show($id)
    {
        
        $orders = Order::findOrFail($id);

        return view('orders.show', ['orders' => $orders]);
    }

    public function edit(Request $request, $id)
    {
        
    }

    public function update(Request $request, $id)
    {
        return redirect('/orders');
    }

    public function destroy(Request $request, $id)
    {
        return redirect('/orders');
    }
}
