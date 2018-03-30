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
        // dd( $orders->orderItems()->get());
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
        $order->orderItems()->delete();
        $order->delete();

        return redirect('/orders');
    }

    public function addService(Request $request, $id) 
    {
        $service = Service::FindOrFail($request->service_id);
        $orders = Order::FindOrFail($id);
        $ammount = $request->service_ammount;
        $this->orderService->add($orders, $service, $ammount);

        return redirect('/orders');
    }

    public function addProduct(Request $request, $id)
    {
        $product = Product::FindOrFail($request->product_id);
        $orders = Order::FindOrFail($id);
        $ammount = $request->product_ammount;
        $this->orderService->add($orders, $product, $ammount);
        
        return redirect('/orders');
    }

    public function deleteOrderItem(Request $request, $id)
    {   
        $this->orderService->delete($request);
        return back();
    }

}
