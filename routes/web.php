<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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



// HOME CONTROLLER

Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/home','redirect');
    Route::post('/appointment','appointment');
    Route::get('/myappointment','myappointment');
    Route::get('/cancel_appoint/{id}','cancel_appoint');
    
    
});

// ADMIN CONTROLLER

Route::controller(AdminController::class)->group(function(){
    Route::get('/add_doctor_view', 'addview');
    Route::post('/upload_doctor', 'upload');
    Route::get('/showappointments', 'showappointments');
    Route::get('/approved/{id}', 'approved');
    Route::get('/canceled/{id}', 'canceled');
    Route::get('/showdoctor', 'showdoctor');
    Route::get('/deletedoctor/{id}', 'deletedoctor');
    Route::get('/updatedoctor/{id}', 'updatedoctor');
    Route::post('/editdoctor/{id}', 'editdoctor');
    
    
});




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});