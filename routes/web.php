<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    $images = DB::table('images')->select('*')->get();
    $myImages =  $images->all();

    return view('dashboard', ['ImagesInView' => $myImages]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/create', function () {
    return view('create');
})->middleware(['auth', 'verified'])->name('create');

Route::get('/show/{id}', function ($id) {
    $image = DB::table('images')->select('*')->where('id', $id)->first();
    $myImage = $image->image;
    return view('show', ['ImageInView' => $myImage]);
})->middleware(['auth', 'verified'])->name('show');

Route::post('/store', function (\Illuminate\Http\Request $request){
    $image = $request->file('image');
    $fileName = $image->store('uploads');
    DB::table('images')->insert(
        ['image' => $fileName]
    );
    return redirect('/');
});

Route::get('/edit/{id}', function ($id) {
    $image = DB::table('images')->select('*')->where('id', $id)->first();
    return view('edit',['ImageInView' => $image]);
})->middleware(['auth', 'verified'])->name('edit');

Route::post('/update/{id}', function (\Illuminate\Http\Request $request,$id){
    $image = DB::table('images')->select('*')->where('id', $id)->first();
    $deleteImage = $image->image;
    Storage::delete($deleteImage);

    $filename = $request->image->store('uploads');
    DB::table('images')
        ->where('id',$id)
        ->update(['image' => $filename]);
    return redirect('/');
});

Route::get('/delete/{id}', function ($id){
    $image = DB::table('images')->select('*')->where('id', $id)->first();
    $deleteImage = $image->image;
    Storage::delete($deleteImage);

    DB::table('images')->where('id', $id)->delete();

    return redirect('/');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
