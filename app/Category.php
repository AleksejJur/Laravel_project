<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    public $table = 'categories';

    protected $fillable = ['title', 'content'];

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

}
