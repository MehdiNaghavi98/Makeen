<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopSingleController;
use App\Http\Controllers\UserController;
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
Route::get('/shop/{cat?}' , [ShopController::class , 'Show'])->name('Show-Shop');
Route::get('/shop-single/{id}' , [ShopSingleController::class , 'Show'])->name('Show-Shop-Single');
Route::get('/about' , [AboutController::class , 'Show'])->name('Show-About');
Route::get('/auth' , [AuthController::class , 'ShowAuthForm'])->name('Show-Auth');
Route::get('/orders' , [OrderController::class , 'ShowOrders'])->name('Show-Orders');
Route::view('User-Details' , 'user')->name('Show-User-Details');
Route::get('/Payment-mellat/{id}' , [PaymentController::class , 'ShowPaymentMellat'])->name('Show-Payment-Mellat');
Route::get('/Payment-sedad/{id}' , [PaymentController::class , 'ShowPaymentSedad'])->name('Show-Payment-Sedad');
Route::get('/final/{id}' , [OrderController::class , 'Final'])->name('Show-Final');
//SHOW PANEL
Route::get('/seller' , [PanelController::class , 'ShowPanel'])->name('Show-Panel');
Route::get('/create' , [PanelController::class , 'ShowCreate'])->name('Show-Create');
Route::get('/categories' , [PanelController::class , 'ShowCategories'])->name('Show-Categories');
Route::get('/delete-allProduct' , [PanelController::class , 'DeleteAllProduct'])->name('DeleteAllProduct');
Route::get('/logout' , [AuthController::class , 'logout'])->name('logout');
Route::get('/delete/{id}' , [PanelController::class , 'delete'])->name('Delete');
Route::get('/change-status/{id}' , [PanelController::class , 'ChangeStatus'])->name('Change-Status');
Route::get('/update/{id}' , [PanelController::class , 'ShowUpdate'])->name('Show-Update');



//SERVER
Route::post('/login' , [AuthController::class , 'Login'])->name('Login');
Route::post('/register' , [AuthController::class , 'Register'])->name('Register');
Route::post('/create' , [PanelController::class , 'CreateProduct'])->name('Create-Product');
Route::post('/add-category' , [PanelController::class , 'CreateCategory'])->name('CreateCategory');
Route::post('/update/{id}' , [PanelController::class , 'UpdateProduct'])->name('UpdateProduct');
Route::post('/AddOrder/{id}' , [OrderController::class , 'AddOrder'])->name('AddOrder');
Route::post('/UpdateOrder/{id}' , [OrderController::class , 'UpdateOrder'])->name('UpdateOrder');
Route::post('/DeleteOrder' , [OrderController::class , 'DeleteOrder'])->name('DeleteOrder');
Route::post('/AddComment/{id}' , [CommentController::class , 'AddComment'])->name('AddComment');


