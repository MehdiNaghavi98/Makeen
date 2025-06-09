<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PanelController;
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

//SHOW Main Site
Route::get('/' , [HomeController::class , 'Show'] )->name('Show-Index');
Route::get('/contact' , [ContactController::class , 'Show'])->name('Show-Contact');
Route::get('/shop' , [ShopController::class , 'Show'])->name('Show-Shop');
Route::get('/shop-single' , [ShopSingleController::class , 'Show'])->name('Show-Shop-Single');
Route::get('/about' , [AboutController::class , 'Show'])->name('Show-About');
Route::get('/auth' , [AuthController::class , 'ShowAuthForm'])->name('Show-Auth');

//SHOW PANEL
Route::get('/seller' , [PanelController::class , 'ShowPanel'])->name('Show-Panel');
Route::get('/create' , [PanelController::class , 'ShowCreate'])->name('Show-Create');

//SERVER
Route::post('/login' , [AuthController::class , 'Login'])->name('Login');
Route::post('/register' , [AuthController::class , 'Register'])->name('Register');
Route::post('/create' , [PanelController::class , 'CreateProduct'])->name('Create-Product');

