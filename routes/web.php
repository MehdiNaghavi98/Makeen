<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopSingleController;
use Illuminate\Support\Facades\Route;

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

//SHOW
Route::get('/' , [HomeController::class , 'Show'] )->name('Show-Index');
Route::get('/contact' , [ContactController::class , 'Show'])->name('Show-Contact');
Route::get('/shop' , [ShopController::class , 'Show'])->name('Show-Shop');
Route::get('/shop-single' , [ShopSingleController::class , 'Show'])->name('Show-Shop-Single');
Route::get('/about' , [AboutController::class , 'Show'])->name('Show-About');

Route::get('/auth' , [AuthController::class , 'ShowAuthForm'])->name('Show-Auth');


//SERVER
Route::post('/register' , [AuthController::class , 'Register'])->name('Register');
