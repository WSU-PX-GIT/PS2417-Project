<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CPDReportController;
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
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/agentAddReport', [CPDReportController::class, 'getQualifications']) -> name('agentAddReport');
Route::get('/agentAllCPD', [CPDReportController::class, 'viewAllReports'])->name('agentAllCPD');
Route::post('report_added', [CPDReportController::class, 'addReport'])->name('addReport');
Route::get('/agentViewReport/{cpd_id}', [CPDReportController::class, 'viewOneReport'])->name('agentViewReport');
Route::get('/deleteReport/{cpd_id}', [CPDReportController::class, 'deleteReport'])->name('deleteReport');
Route::get('/agentEditReport/{cpd_id}', [CPDReportController::class, 'editReport'])->name('editReport');
Route::post('/agentEditReport/{cpd_id}', [CPDReportController::class, 'updateReport'])->name('updateReport');
Route::get('/searchCPD', [CPDReportController::class, 'search'])->name('searchCPDRecords');


require __DIR__.'/auth.php';


