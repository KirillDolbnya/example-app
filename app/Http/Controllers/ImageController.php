<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use Illuminate\Http\Request;

class ImageController extends Controller
{

    private $images;

    public function __construct(ImageService $imageService)
    {
        $this->images =  $imageService;
    }

    public function index(){
        return view('dashboard', ['ImagesInView' => $this->images->getAll()]);
    }

    public function create(){
        return view('create');
    }

    public function show($id){
        return view('show', ['ImageInView' => $this->images->getById($id)]);
    }

    public function store(Request $request){
        $this->validate($request,[
           'image'=>'required|image',
        ]);

        $image = $request->file('image');

        $this->images->add($image);

        return redirect('/dashboard');
    }

    public function edit($id){
        return view('edit',['ImageInView' =>  $this->images->getById($id)]);
    }

    public function update(Request $request,$id){
        $this->images->update($id,$request->image);
        return redirect('/dashboard');
    }

    public function delete($id){
        $this->images->delete($id);

        return redirect('/dashboard');
    }
}


