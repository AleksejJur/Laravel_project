<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $table = 'orders';

    protected $fillable = ['adress', 'clientFullName', 'clientNumber', 'orderDescription', 'orderStatus'];

    public function orderItems()
    {
        return $this->hasMany('App\OrderItem');
    }
}