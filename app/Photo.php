<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
  
//   public $table = 'photos';

  protected $fillable = ['file_name'];

//   public $timestamps = true;
    
    public function photable()
    {
        return $this->morphTo();
    }
}
