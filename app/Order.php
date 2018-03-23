<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $table = 'order';

    protected $fillable = ['status'];

    public function orderItems()
    {
        return $this->hasMany('App\OrderItem');
    }
}