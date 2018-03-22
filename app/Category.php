<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'categories';

    protected $fillable = ['title', 'content'];

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    /**
     * Get all of the categories photos.
     */
    public function photos()
    {
        return $this->morphMany('App\Photo', 'photobale');
    }

}
