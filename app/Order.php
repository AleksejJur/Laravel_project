<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Order extends Model
{   
    use Searchable;

    public function searchableAs()
    {
        return 'orderSearch';
    }

    public $table = 'orders';

    protected $fillable = ['adress', 'clientFullName', 'clientNumber', 'orderDescription', 'orderStatus'];

    public function orderItems()
    {
        return $this->hasMany('App\OrderItem');
    }
}