<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Service extends Model
{   
    use Searchable;

    public function searchableAs()
    {
        return 'serviceSearch';
    }

    public $table = 'services';

    protected $fillable = ['title', 'content', 'price'];

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
