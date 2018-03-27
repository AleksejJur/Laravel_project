<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Service;
use App\Order;
use App\Services\PhotoService;

class OrderController extends Controller
{
    
    public function index()
    {
        $orders = Order::all();

        return view('orders.index', ['orders' => $orders]);
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $order = Order::create(['adress' => $request->adress,
                                'clientFullName' => $request->clientFullName,
                                'clientNumber' => $request->clientNumber,
                                'orderDescription' => $request->orderDescription,
                                'orderStatus' => $request->orderStatus]);

        return redirect('/orders');
    }

    public function show($id)
    {
        $orders = Order::findOrFail($id);

        return view('orders.show', ['orders' => $orders]);
    }

    public function edit(Request $request, $id)
    {
        $order = Order::FindOrFail($id);
        return view('orders.edit', ['order' => $order]);
    }

    public function update(Request $request, $id)
    {
        //Validate
        $request->validate([
            'adress' => 'required|min:3',
            'clientFullName' => 'required',
            'clientNumber' => 'required',
            'orderDescription' => 'required',
            'orderStatus' => 'required',
            'photoForService' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $order = Order::FindOrFail($id);
        $order->adress = $request->adress;
        $order->clientFullName = $request->clientFullName;
        $order->clientNumber = $request->clientNumber;
        $order->orderDescription = $request->orderDescription;
        $order->orderStatus = $request->orderStatus;
        $order->save();

        return redirect('/orders');
    }

    public function destroy(Request $request, $id)
    {
        $order = Order::FindOrFail($id);
        $order->delete();
        return redirect('/orders');
    }
}
