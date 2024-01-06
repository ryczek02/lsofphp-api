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

Route::get('/', function (){
    return [
        'PHP_VERSION' => phpversion(),
        'SERVER' => 'http://' . $_SERVER['HTTP_HOST'] . '/server',
        'REQUEST' => 'http://' . $_SERVER['HTTP_HOST'] . '/request',
        'OCTANE' => isset($_SERVER['OCTANE_SERVER']),
    ];
});

Route::get('/send', [MercureController::class, 'pushEvent']);


Route::get('/request', function(){
    return $_REQUEST;
});

Route::get('/server', function(){
    return $_SERVER;
});

Route::get('/php', function(){
    return ["PHP_VERSION" => phpversion()]  ;
});
