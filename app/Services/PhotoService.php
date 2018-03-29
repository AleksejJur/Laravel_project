<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Services\PhotoService;
use Storage;
use App\Photo;
use Intervention\Image\ImageManager;
use Image;

class PhotoService
{
    public function add($file, $object) 
    {
        $image = storage_path('app/public/') . time() . $file->getClientOriginalName();
        Image::make($file)->resize(200, 200)->save($image);
        $object->photos()->create(['file_name' => time() .$file->getClientOriginalName()]);
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

    public function deleteSome($ids)
    {
        foreach ($ids as $id)
        {
            $photo = Photo::FindOrFail($id);
            Storage::delete('public/' . $photo->file_name);
            $photo->delete();
        }
         
    }

    
}
