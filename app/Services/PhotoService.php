<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class PhotoService
{
    // public function store($what, $where) 
    // {
    //     // Storing Photo for 

    //     if($request->isMethod('post')){
    //         if($request->hasFile($what)) {
    //             $file = $request->file($what);
    //             $path = $file->store('public');
    //             $path = basename($path);
    //             $where->photos()->create(['file_name' => $path]);
    //         }
    //     }
    // }

    public function edit()
    {

    }

    public function delete()
    {
        $what->photos()->delete();
    }

    public function add($file, $object) {
        $path = $file->store('public');
        $path = basename($path);
        $object->photos()->create(['file_name' => $path]);
    }
}
