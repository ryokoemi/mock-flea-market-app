<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\MypageController;

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

Route::get('/', [AuthController::class, 'index']);
Route::get('/sell', [SellController::class, 'showForm'])->name('sell.form');
Route::get('/item', [ItemController::class, 'show']);
Route::get('/purchase/{id}', [PurchaseController::class, 'show'])->name('purchase');
Route::post('/item/{id}/comment', [CommentController::class, 'store'])->name('comment.store');
Route::get('/purchase', [PurchaseController::class, 'show']);
Route::get('/profile', [ProfileController::class, 'show']);
Route::get('/address', [AddressController::class, 'edit'])->name('address.edit');
Route::get('/mypage', [MypageController::class, 'show'])->name('mypage.show');