<?php

namespace App\HelperClasses;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImageHandler
{   
    /** all below functions takes a parameter $dir which represnts the image directory name in the storage (ex. blogs) */

    // this function takes an image(DB name) and return the image url to be sent to front_end
    public static function showImg($image, $dir){
         
      return 'storage\img\\'.$dir.'\\'.$image;
    }

    // this function takes a base64 encoded image and store it in the filesystem and return the name of it (ex. 12546735.png) that will be stored in DB
    public static function storeImg($image, $dir)
    {
      $path = 'public/img/'.$dir.'/';

      if(!Storage::exists($path)){
        Storage::makeDirectory($path);
      }
      $name = microtime(true).'.'.explode('/',explode(':', explode(';',$image)[0])[1])[1];

      $image = Image::make($image)->save(storage_path('app/public/img/'.$dir.'/').$name, 75);
      
      return $name;
    }

    // this function takes $newImage(base64 encoded) and $oldImage(DB name) , it deletes the $oldImage from the filesystem and store the $newImage and return it's name that will be stored in DB
    public static function updateImg($newImage, $oldImage, $dir){
         
          $name = microtime(true).'.'.explode('/',explode(':', explode(';',$newImage)[0])[1])[1];

          Image::make($newImage)->save(storage_path('app/public/img/'.$dir.'/').$name, 75);

          if(file_exists(storage_path('app/public/img/'.$dir.'/').$oldImage) && $oldImage != 'user.png' ){
            Storage::delete('public/img/'.$dir.'/'.$oldImage);
          }

          return $name;
    }

    // this function takes image(DB name) and deletes it from the filesystem , returns true if deleted and false if not found
    public static function deleteImg($image, $dir){
         
        if(file_exists(storage_path('app/public/img/'.$dir.'/').$image) && $image != 'user.png' ){
          Storage::delete('public/img/'.$dir.'/'.$image);
            return true;
        }

        return false;
  }
}

