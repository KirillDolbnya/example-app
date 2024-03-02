<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index(){
        $images = DB::table('images')->select('*')->get();
        $myImages =  $images->all();

        return view('dashboard', ['ImagesInView' => $myImages]);
    }

    public function create(){
        return view('create');
    }

    public function show($id){
        $image = DB::table('images')->select('*')->where('id', $id)->first();
        $myImage = $image->image;
        return view('show', ['ImageInView' => $myImage]);
    }

    public function store(Request $request){
        $image = $request->file('image');
        $fileName = $image->store('uploads');
        DB::table('images')->insert(
            ['image' => $fileName]
        );
        return redirect('/');
    }

    public function edit($id){
        $image = DB::table('images')->select('*')->where('id', $id)->first();
        return view('edit',['ImageInView' => $image]);
    }

    public function update(Request $request,$id){
        $image = DB::table('images')->select('*')->where('id', $id)->first();
        $deleteImage = $image->image;
        Storage::delete($deleteImage);

        $filename = $request->image->store('uploads');
        DB::table('images')
            ->where('id',$id)
            ->update(['image' => $filename]);
        return redirect('/');
    }

    public function delete($id){
        $image = DB::table('images')->select('*')->where('id', $id)->first();
        $deleteImage = $image->image;
        Storage::delete($deleteImage);

        DB::table('images')->where('id', $id)->delete();

        return redirect('/');
    }
}


