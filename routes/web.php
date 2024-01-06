<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MercureController;

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

Route::get('/pingpong', function (){
    return view('welcome');
});

Route::get('/send', [MercureController::class, 'pushEvent']);
Route::get('/send_specified', [MercureController::class, 'pushEventSpecified']);


Route::get('/request', function(){
    return $_REQUEST;
});

Route::get('/server', function(){
    return $_SERVER;
});

Route::get('/php', function(){
    return ["PHP_VERSION" => phpversion()]  ;
});
