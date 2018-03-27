<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{   
    public $table = 'order_item';

    protected $fillable = ['order_id', 'price', 'ammount', 'orderable_id', 'orderable_type'];
    
    public function orderable()
    {
        return $this->morphTo();
    }
}
