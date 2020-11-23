<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\ScrapController;

use App\Http\Controllers\ContactUsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    //return view('dashboard');
    return redirect()->route('advertisements.index');
})->name('dashboard');

Route::resource('categories', CategoryController::class)->parameters(['categories'=>'category'])->names('categories')->middleware(['auth:sanctum', 'verified']);
Route::resource('subcategories', SubcategoryController::class)->parameters(['subcategories'=>'subcategory'])->names('subcategories')->middleware(['auth:sanctum', 'verified']);

Route::post('advertisements/search/', [AdvertisementController::class, 'search'])->name('advertisements.search')->middleware(['auth:sanctum', 'verified']);
Route::get('advertisements/subcategory/{subcategory}', [AdvertisementController::class, 'showsubcategory'])->name('advertisements.subcategory')->middleware(['auth:sanctum', 'verified']);
Route::resource('advertisements', AdvertisementController::class)->parameters(['advertisements'=>'advertisement'])->names('advertisements')->middleware(['auth:sanctum', 'verified']);

Route::get('scraps', [ScrapController::class, 'index'])->name('scraps.index')->middleware(['auth:sanctum', 'verified']);
Route::post('scraps', [ScrapController::class, 'store'])->name('scraps.store')->middleware(['auth:sanctum', 'verified']);

Route::view('us', 'us')->name('us');

Route::get('contactus', [ContactUsController::class, 'index'])->name('contactus.index');
Route::post('contactus', [ContactUsController::class, 'store'])->name('contactus.store');

Route::get('prueba', function(){
    return "Has accedido correctamente";
})->middleware(['auth:sanctum','age']);

Route::get('not-authorized', function(){
    return "Not admitted age";
});

/*Route::apiResources([
    'photos' => PhotoController::class,
    'posts' => PostController::class,
]);*/