<?php

namespace App\Orders;

use Illuminate\Http\Request;
use App\Product;
use App\Service;
use App\Order;
use App\OrderItem;
use App\Photo;
use App\Services\PhotoService;
use Storage;


class OrderService
{
    public function add(Request $request, $id)
    {
        // $order = OrderItem::where('order_id', '=', $id)
        //                     ->where('orderable_id', '=', $request->service_id)
        //                     ->where('orderable_type', '=', Service::class)->first();

        //                     if ($order != null) 
        //                     {
        //                         $order->ammount += $request->service_ammount;
        //                         $order->save();
        //                     } 
        //                     else 
        //                     {
        //                        $orderItem = OrderItem::create(['order_id' => $id,
        //                               'price' => $service->price,
        //                               'orderable_id' => $service->id,
        //                               'orderable_type' => Service::class,
        //                               'ammount' => $request->service_ammount,
        //                              ]); 
        //                     }
    }

    public function update($object, $request)
    {
        $object->adress = $request->adress;
        $object->clientFullName = $request->clientFullName;
        $object->clientNumber = $request->clientNumber;
        $object->orderDescription = $request->orderDescription;
        $object->orderStatus = $request->orderStatus;
        $object->save();
    }

    public function delete($object)
    {
        $object->orderItems()->delete();
    }
}
