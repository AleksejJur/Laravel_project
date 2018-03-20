<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
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
}
   
