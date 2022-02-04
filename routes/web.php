<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/UploadFile', [HomeController::class,'uploadFile'])->name('uploadFile');
Route::get('/AllFiles', [HomeController::class,'AllFiles'])->name('allFiles');
Route::post('/store', [HomeController::class,'store'])->name('store');
Route::get('/{link_share}', [HomeController::class,'share'])->name('share');

