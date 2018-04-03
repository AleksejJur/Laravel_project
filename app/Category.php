<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Category extends Model
{
    use Searchable;

    public function searchableAs()
    {
        return 'categorySearch';
    }

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
