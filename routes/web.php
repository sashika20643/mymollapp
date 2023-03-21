<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\OrderController;
use App\http\Controllers\UserController;
use App\http\Controllers\StoreController;



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


Route::get('/register', function () {
    return redirect('/login');
});
Route::get('/', function () {
    return redirect(route('login'));
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', function () {
        return redirect(route('allstores'));
    })->name('dashboard');
    route::get('/adduser',[UserController::class,'Addusers'])->name('adduser');
    route::post('storeuser',[UserController::class,'storeusers'])->name('storeuser');
    route::post('storestore',[StoreController::class,'storestore'])->name('storestore');
    route::post('setrate',[StoreController::class,'setrate'])->name('setrate');


    route::delete('/deletestore/{id}',[StoreController::class,'deletestore'])->name('deletestore');




    route::get('/addstore',[StoreController::class,'addstore'])->name('addstore');
    route::get('/allusers',[UserController::class,'Allusers'])->name('allusers');
    route::delete('/deleteuser/{id}',[UserController::class,'deleteuser'])->name('deleteuser');
    route::post('/changestate/{id}',[OrderController::class,'changestate'])->name('changestate');



    route::get('/allstores',[StoreController::class,'allstores'])->name('allstores');
    route::get('/allorders',[OrderController::class,'Allorders'])->name('allorders');






});
