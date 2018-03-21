<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Services\PhotoService;
use Storage;

class PhotoService
{
    public function add($file, $object) 
    {
        $path = $file->store('public');
        $path = basename($path);
        $object->photos()->create(['file_name' => $path]);
    }

    public function update($file, $object)
    {
        $this->delete($object);
        $this->add($file, $object);
    }

    public function delete($object)
    {   
        foreach ($object->photos as $photo) 
        {
            Storage::delete('public/' . $photo->file_name);
        }

        $object->photos()->delete();
        
        
    }

    
}
