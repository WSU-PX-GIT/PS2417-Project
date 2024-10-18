<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CPDController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

route::get('/home', [HomeController::class, 'index']) ->middleware('auth') -> name('home');
Route::get('/search', [SearchController::class, 'search'])->name('user.search');
Route::get('/adminassign', function () {return view('admin.adminassign');}) -> name('adminassign');
Route::get('/adminassign2', function () {return view('admin.adminassign2');}) -> name('adminassign2');
Route::get('/admincreate', function () {return view('admin.admincreate');}) -> name('admincreate');
Route::get('/adminAddCPD', function () {return view('admin.adminAddCPD');}) -> name('adminAddCPD');
Route::get('/adminViewCPD', [CPDController::class, 'searchCPD']) -> name('adminViewCPD');
Route::get('/adminEditCPD', [CPDController::class, 'searchCPD2']) -> name('adminEditCPD');
Route::get('adminEditConfirm/,{id}', function () {return view('admin.adminEditConfirm');}) -> name('adminEditConfirm');
Route::get('/adminDeleteCPD', [CPDController::class, 'searchCPD3']) -> name('adminDeleteCPD');
Route::get('adminDeleteConfirm/,{id}',  [CPDController::class, 'deleteCPD']) -> name('adminDeleteConfirm');
Route::post('/addCPD', [CPDController::class, 'addCPD']) -> name('addCPD');
Route::post('/editCPD', [CPDController::class, 'editCPD']) -> name('editCPD');


Route::get('/agencyassign', function () {return view('agency.agencyassign');}) -> name('agencyassign');
Route::get('/agencycreate', function () {return view('agency.agencycreate');}) -> name('agencycreate');
Route::get('/adminmanagement', function () {return view('admin.cpdmanagement');}) -> name('adminmanagement');
Route::post('registeradmin', [RegisteredUserController::class, 'adminstore'])->name('registeradmin');
Route::post('registeragency', [RegisteredUserController::class, 'agencystore'])->name('registeragency');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
