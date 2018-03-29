<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Product;
use App\Service;
use App\Order;
use App\OrderItem;
use App\Services\PhotoService;
use App\Orders\OrderService;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;

    }
    public function index()
    {
        $orders = Order::all();
        $orderItem = OrderItem::all();

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
        $orders = Order::FindOrFail($id);
        $orderItemService = $orders->orderItems()->where('orderable_type', Service::class)->get();
        $orderItemProduct = $orders->orderItems()->where('orderable_type', Product::class)->get();

        return view('orders.show', ['orders' => $orders,
                                    'orderItemService' => $orderItemService, 
                                    'orderItemProduct' => $orderItemProduct]);
    }

    public function edit(Request $request, $id)
    {
        $order = Order::FindOrFail($id);

        return view('orders.edit', ['order' => $order]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'adress' => 'required|min:3',
            'clientFullName' => 'required',
            'clientNumber' => 'required',
            'orderDescription' => 'required',
            'orderStatus' => 'required',
            'photoForService' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $order = Order::FindOrFail($id);
        $this->orderService->update($order, $request);

        return redirect('/orders');
    }

    public function destroy(Request $request, $id)
    {
        $order = Order::FindOrFail($id);
        $this->orderService->delete($order);
        $order->delete();

        return redirect('/orders');
    }

    public function addService(Request $request, $id) 
    {
        $service = Service::FindOrFail($request->service_id);
        $orders = Order::FindOrFail($id);

        $order = OrderItem::where('order_id', '=', $id)
                            ->where('orderable_id', '=', $request->service_id)
                            ->where('orderable_type', '=', service::class)->first();

                            if ($order != null) 
                            {
                                $order->ammount += $request->service_ammount;
                                $order->save();
                            } 
                            else 
                            {
                               $orderItem = OrderItem::create(['order_id' => $id,
                                      'price' => $service->price,
                                      'orderable_id' => $service->id,
                                      'orderable_type' => service::class,
                                      'ammount' => $request->service_ammount,
                                     ]); 
                            }
            

        return redirect('/orders');
    }

    public function addProduct(Request $request, $id)
    {
        $product = Product::FindOrFail($request->product_id);
        $orders = Order::FindOrFail($id);

        $order = OrderItem::where('order_id', '=', $id)
                            ->where('orderable_id', '=', $request->product_id)
                            ->where('orderable_type', '=', Product::class)->first();

                            if ($order != null) 
                            {
                                $order->ammount += $request->product_ammount;
                                $order->save();
                            } 
                                else 
                            {
                               $orderItem = OrderItem::create(['order_id' => $id,
                                      'price' => $product->price,
                                      'orderable_id' => $product->id,
                                      'orderable_type' => Product::class,
                                      'ammount' => $request->product_ammount,
                                     ]); 
                            }

        return redirect('/orders');
    }
}
