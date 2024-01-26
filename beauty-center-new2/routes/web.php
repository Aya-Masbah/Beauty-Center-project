<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Models\Employee;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'redirect']);

Route::middleware([
    'auth:sanctum',
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/add_employee_view', [AdminController::class, 'addview']);
Route::post('/upload_employee', [AdminController::class, 'upload']);
Route::post('/appointment', [HomeController::class, 'appointment']);

Route::get('/myappointment', [HomeController::class, 'myappointment'])->name('myappointment');

Route::get('/cancel_appoint/{id}', [HomeController::class, 'cancel_appoint']);

Route::get('/showappointment', [AdminController::class, 'showappointment']);

Route::get('/approved/{id}', [AdminController::class, 'approved']);
Route::get('/canceled/{id}', [AdminController::class, 'canceled']);

Route::get('/showemployee', [AdminController::class, 'showemployee']);

Route::get('/deleteemployee/{id_Employe}', [AdminController::class, 'deleteemployee']);

Route::get('/updateemployee/{id_Employe}', [AdminController::class, 'updateemployee']);

Route::post('/editemployee/{id_Employe}', [AdminController::class, 'editemployee']);
