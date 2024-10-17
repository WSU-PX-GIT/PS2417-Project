<?php

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
Route::get('/admincreate', function () {return view('admin.admincreate');}) -> name('admincreate');
Route::get('/agentaddReport', function () {return view('agent.agentaddReport');}) -> name('agentaddReport');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
