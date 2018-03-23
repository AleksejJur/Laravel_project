<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['order_id', 'price', 'ammount'];
    public function orderable()
    {
        return $this->morphTo();
    }
}
