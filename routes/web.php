<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CPDController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CPDReportController;
use App\Http\Controllers\ReminderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

route::get('/home', [HomeController::class, 'index']) ->middleware('auth') -> name('home');
Route::get('/adminsearch', [SearchController::class, 'adminsearch'])->name('admin.search');
Route::get('/agencysearch', [SearchController::class, 'agencysearch'])->name('agency.search');
Route::post('editAgencyUserConfirm/,{id}', [SearchController::class, 'editAgencyUserConfirm']) -> name('editAgencyUserConfirm');
Route::post('editAdminUserConfirm/,{id}', [SearchController::class, 'editAdminUserConfirm']) -> name('editAdminUserConfirm');
Route::get('/adminassign', function () {return view('admin.adminassign');}) -> name('adminassign');
Route::get('/adminassignconfirm', function () {return view('admin.adminassignconfirm');}) -> name('adminassignconfirm');
Route::get('/admincreate', function () {return view('admin.admincreate');}) -> name('admincreate');
Route::get('/adminAddCPD', function () {return view('admin.adminAddCPD');}) -> name('adminAddCPD');
Route::get('/adminViewCPD', [CPDController::class, 'searchCPD']) -> name('adminViewCPD');
Route::get('/adminEditCPD', [CPDController::class, 'searchCPD2']) -> name('adminEditCPD');
Route::get('adminEditConfirm/,{id}', function () {return view('admin.adminEditConfirm');}) -> name('adminEditConfirm');
Route::get('/adminDeleteCPD', [CPDController::class, 'searchCPD3']) -> name('adminDeleteCPD');
Route::get('adminDeleteConfirm/,{id}',  [CPDController::class, 'deleteCPD']) -> name('adminDeleteConfirm');
Route::post('/addCPD', [CPDController::class, 'addCPD']) -> name('addCPD');
Route::get('editCPD/,{id}', [CPDController::class, 'editCPD']) -> name('editCPD');
Route::post('editCPDConfirm/,{id}', [CPDController::class, 'editCPDConfirm']) -> name('editCPDConfirm');

Route::get('/agencyassign', function () {return view('agency.agencyassign');}) -> name('agencyassign');
Route::get('/agencycreate', function () {return view('agency.agencycreate');}) -> name('agencycreate');
Route::get('/adminmanagement', function () {return view('admin.cpdmanagement');}) -> name('adminmanagement');
Route::post('registeradmin', [RegisteredUserController::class, 'adminstore'])->name('registeradmin');
Route::post('registeragency', [RegisteredUserController::class, 'agencystore'])->name('registeragency');

Route::get('/send-reminder/{agent}', [ReminderController::class, 'sendReminder'])->name('agency.reminder');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/agentAddReport', [CPDReportController::class, 'getQualifications']) -> name('agentAddReport');
Route::get('/downloadReport/{cpd_filename}', [CPDReportController::class, 'downloadReport']) -> name('downloadReport');
Route::get('/agentAllCPD', [CPDReportController::class, 'viewAllReports'])->name('agentAllCPD');
Route::post('report_added', [CPDReportController::class, 'addReport'])->name('addReport');
Route::get('/agentViewReport/{cpd_id}', [CPDReportController::class, 'viewOneReport'])->name('agentViewReport');
Route::get('/deleteReport/{cpd_id}', [CPDReportController::class, 'deleteReport'])->name('deleteReport');
Route::get('/agentEditReport/{cpd_id}', [CPDReportController::class, 'editReport'])->name('editReport');
Route::post('/agentEditReport/{cpd_id}', [CPDReportController::class, 'updateReport'])->name('updateReport');
Route::get('/searchCPD', [CPDReportController::class, 'search'])->name('searchCPDRecords');

Route::get('/agencySendReminder', [CPDReportController::class, 'findAgentReports'])->name('agencySendReminder');
Route::get('/agentActionRequired', [CPDReportController::class, 'closeToExpiryReports'])->name('agentActionRequired');

require __DIR__.'/auth.php';


