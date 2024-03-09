<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageService{

    public function getAll(){
        $images = DB::table('images')->select('*')->get();
        $myImages =  $images->all();

        return collect($myImages);
    }

    public function add($image){
        $fileName = $image->store('uploads');
        DB::table('images')->insert(
            ['image' => $fileName]
        );
    }

    public function getById($id){
        $image = DB::table('images')->select('*')->where('id', $id)->first();
        $myImage = $image;

        return $myImage;
    }

    public function update($id,$newImage){
        $image = $this->getById($id);
        $deleteImage = $image->image;
        Storage::delete($deleteImage);

        $filename = $newImage->store('uploads');
        DB::table('images')
            ->where('id',$id)
            ->update(['image' => $filename]);
    }

    public function delete($id){
        $image = $this->getById($id);
        $deleteImage = $image->image;
        Storage::delete($deleteImage);

        DB::table('images')->where('id', $id)->delete();
    }
}
