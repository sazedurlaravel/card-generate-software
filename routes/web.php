<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompanyProfileController;



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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group([ 'middleware' => 'auth'], function()
{

//     Route::get('/', function () {
//     return view('backend.layouts.dashboard');
// });

Route::get('/',[HomeController::class, 'dashboard'])->name('dashboard');

   //user routes
Route::prefix('users')->group(function(){
    Route::get('/view', [UserController::class, 'view'])->name('users.view');
    Route::get('/add', [UserController::class, 'add'])->name('users.add');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::post('/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/delete/{id}', [UserController::class, 'delete'])->name('users.delete');


});

//profile route
Route::prefix('profiles')->group(function(){
    Route::get('/view', [ProfileController::class, 'view'])->name('profiles.view');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
    Route::post('/update', [ProfileController::class, 'update'])->name('profiles.update');
    Route::get('/password/view', [ProfileController::class, 'password'])->name('profiles.password.view');
    Route::post('/password/update', [ProfileController::class, 'passwordUpdate'])->name('profiles.password.update');


});

//company Profile Controller

Route::prefix('company')->group(function(){
    Route::get('/view', [CompanyProfileController::class, 'view'])->name('company.view');
    Route::get('/add', [CompanyProfileController::class, 'add'])->name('company.add');
    Route::get('/edit/{id}', [CompanyProfileController::class, 'edit'])->name('company.edit');
    Route::post('/update/{id}', [CompanyProfileController::class, 'update'])->name('company.update');
    Route::post('/store', [CompanyProfileController::class, 'store'])->name('company.store');
    Route::get('/delete/{id}', [CompanyProfileController::class, 'delete'])->name('company.delete');
    //pouroshova
    Route::get('/pouroshova/add',[CompanyProfileController::class, 'pouroForm'])->name('pouro.form');
    Route::post('/pouroshova/store',[CompanyProfileController::class, 'pouroStore'])->name('pouro.store');



});

//company card Profile Controller

Route::prefix('card')->group(function(){
    Route::get('/', [CardController::class, 'index'])->name('card.view');
    Route::get('/create', [CardController::class, 'create'])->name('card.create');
    Route::get('/edit/{id}', [CardController::class, 'edit'])->name('card.edit');
    Route::get('/print/{id}', [CardController::class, 'print'])->name('card.print');
    Route::get('/single_view/{id}', [CardController::class, 'singleView'])->name('card.single_view');
    Route::get('/fetch_prefix/{id}', [CardController::class, 'fetch_prefix'])->name('card.fetch_prefix');
    Route::post('/update/{id}', [CardController::class, 'update'])->name('card.update');
    Route::post('/store', [CardController::class, 'store'])->name('card.store');
    Route::get('/delete/{id}', [CardController::class, 'delete'])->name('card.delete');
    Route::get('/allCard', [CardController::class, 'allCard'])->name('card.all');

    


});


});


