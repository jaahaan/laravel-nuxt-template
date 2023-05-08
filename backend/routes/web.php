<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\AuthController;

use App\Http\Controller\WishListController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;



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

Route::get('/', function () {
    return view('welcome');
});
//auth user
Route::get('/app/auth_user', [HomeController::class, 'authUser'])->middleware('jwt.verify');

Route::prefix('/app')->group(function(){
    Route::get('/verify_backend_connection', [HomeController::class, 'getConnection']);
});
