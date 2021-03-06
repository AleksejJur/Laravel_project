<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['file_name'];

    public function photable()
    {
        return $this->morphTo();
    }
}
