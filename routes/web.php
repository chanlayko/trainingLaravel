<?php

use App\Test;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[HomeController::class,'index']);
Route::get('about',[HomeController::class,'about']);
Route::get('contact',[HomeController::class,'contact']);

Route::get('/',function(Test $test){
    // app()->bind('test',function(){
    //     return new Test();
    // });

    // $data = resolve($test);
    dd($test);
});
Route::resource('/post',PostController::class)->middleware('auth');

Route::get('logout',[AuthController::class,'logout']);

