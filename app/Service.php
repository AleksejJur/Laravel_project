<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public $table = 'services';

    protected $fillable = ['title', 'content', 'price'];

    /**
     * Get all of the categories photos.
     */
    public function photos()
    {
        return $this->morphMany('App\Photo', 'photobale');
    }
}
