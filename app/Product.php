<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use Searchable;

    public function searchableAs()
    {
        return 'productSearch';
    }

    public $table = 'products';

    protected $fillable = ['title', 'manufacturer', 'description', 'size', 'material', 'price', 'category'];

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    /**
     * Get all of the categories photos.
     */
    public function photos()
    {
        return $this->morphMany('App\Photo', 'photobale');
    }

    public function orderItems()
    {
        return $this->morphMany('App\OrderItem', 'orderable');
    }
}
   
