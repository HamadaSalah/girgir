<?php

namespace App\Traits;

trait UploadImage
{
    public function uploadImage($image, $path , $old_path = null)
    {
        if($old_path){
            if(file_exists(public_path('uploads/images/'.$path.'/'.$old_path))){
                unlink(public_path('uploads/images/'.$path.'/'.$old_path));
            }
        }
        $image_name = \Str::uuid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/images/'.$path), $image_name);
        return $image_name;
    }
}
