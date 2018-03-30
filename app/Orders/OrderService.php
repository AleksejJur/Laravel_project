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
    public function add($order, $object, $ammount)
    {   
     
        $orderItem = OrderItem::where('order_id', '=', $order->id)
                               ->where('orderable_id', '=', $object->id)
                               ->where('orderable_type', '=', get_class($object))->first();

        if ($orderItem != null) 
        {
            $orderItem->ammount += $ammount;
            $orderItem->save();
        } 
        else 
        {
            $orderItem = OrderItem::create(['order_id' => $order->id,
                    'price' => $object->price,
                    'orderable_id' => $object->id,
                    'orderable_type' => get_class($object),
                    'ammount' => $ammount,
                    ]); 
        }
    }

    public function update()
    {

    }

    public function delete()
    {
       
    }
}
