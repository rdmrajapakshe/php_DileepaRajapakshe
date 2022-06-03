<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\SaleManagerController::class, 'index']);
Route::post('/Add_Sales_Member', [App\Http\Controllers\SaleManagerController::class, 'Add_Member']);
Route::post('/Edit_Sales_Member', [App\Http\Controllers\SaleManagerController::class, 'Edit_Member']);
Route::delete('/Delete_Member/{id}', [App\Http\Controllers\SaleManagerController::class, 'Delete_Member']);
Route::post('/Get_Edit_Info', [App\Http\Controllers\SaleManagerController::class, 'Get_Edit_Data']);
