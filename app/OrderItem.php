<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    public function orderable()
    {
        return $this->morphTo();
    }
}
