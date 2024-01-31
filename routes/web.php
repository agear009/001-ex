<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardIndexController;
use App\Http\Controllers\LoginuserController;
use Illuminate\Support\Facades\Auth;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web Routes for your application. These
| Routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {return view('login.index',["title"=>"home","active"=>"index"]);})->name('login')->middleware('guest');
// Route::POST('/logout',  [LoginController::class,'logout']);


// Route::resource('/register',\App\Http\Controllers\UserController::class)->middleware('guest');
// Route::resource('/index',\App\Http\Controllers\IndexController::class)->middleware('guest');
// Route::resource('/posts', \App\Http\Controllers\PostController::class)->middleware('auth');
// Route::resource('/abouts', \App\Http\Controllers\AboutController::class)->middleware('auth');
// Route::resource('/members', \App\Http\Controllers\MemberController::class)->middleware('auth');
// Route::resource('/countrys', \App\Http\Controllers\CountryController::class)->middleware('auth');
// Route::resource('/categorys', \App\Http\Controllers\CategoryController::class)->middleware('auth');
// Route::resource('/categoryproducts', \App\Http\Controllers\CategoryProductController::class)->middleware('auth');
// Route::resource('/products', \App\Http\Controllers\ProductController::class)->middleware('auth');
// Route::resource('/shippingcountrys', \App\Http\Controllers\ShippingcostController::class)->middleware('auth');

// Route::POST('/login',  [LoginController::class,'autenticate']);

// Route::GET('/dashboard',  [DashboardController::class,'index'])->middleware('auth');


Route::get('/', function () {
            return view('login.index',["title"=>"home","active"=>"index"]);
        })->name('login')->middleware('guest');
Route::get('/loginuser', function () {
            return view('login.login',["title"=>"home","active"=>"login"]);
            })->name('login')->middleware('guest');


Route::post('/login',  [LoginController::class,'autenticate']);
Route::post('/loginusercek',  [LoginUserController::class,'autenticate']);
Route::post('/logout',  [LoginController::class,'logout']);
Route::post('/logoutuser',  [LoginUserController::class,'logout']);
Route::resource('/index',\App\Http\Controllers\IndexController::class);
Route::resource('/visitor', \App\Http\Controllers\VisitorController::class);
Route::resource('/register',\App\Http\Controllers\UserController::class);

Route::group(["middleware"=>["auth"]],function(){
//Route::resource('/register',\App\Http\Controllers\UserController::class);
Route::resource('/posts', \App\Http\Controllers\PostController::class);
Route::resource('/abouts', \App\Http\Controllers\AboutController::class);
Route::resource('/members', \App\Http\Controllers\MemberController::class);
Route::resource('/countrys', \App\Http\Controllers\CountryController::class);
Route::resource('/categorys', \App\Http\Controllers\CategoryController::class);
Route::resource('/categoryproducts', \App\Http\Controllers\CategoryProductController::class);
Route::resource('/products', \App\Http\Controllers\ProductController::class);
Route::resource('/shippingcosts', \App\Http\Controllers\ShippingcostController::class);
Route::resource('/dashboardindexs', \App\Http\Controllers\DashboardIndexController::class);
Route::resource('/shoppingcarts', \App\Http\Controllers\ShoppingCartController::class);
Route::get('/dashboard',  [DashboardController::class,'index']);
});
