<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TypeServiceController;

Route::group(['prefix' => 'clients'], function () {
    Route::get('/', [ClientController::class, 'index']);
    Route::post('/', [ClientController::class, 'store']);
    Route::get('/{id}', [ClientController::class, 'show']);
    Route::put('/{id}', [ClientController::class, 'update']);
    Route::delete('/{id}', [ClientController::class, 'destroy']);
    // Vous pouvez ajouter des routes spécifiques liées aux clients ici
});

Route::group(['prefix' => 'comptes'], function () {
    Route::get('/', [CompteController::class, 'index']);
    Route::post('/', [CompteController::class, 'store']);
    Route::get('/{id}', [CompteController::class, 'show']);
    Route::put('/{id}', [CompteController::class, 'update']);
    Route::delete('/{id}', [CompteController::class, 'destroy']);
    // Routes spécifiques aux comptes
});

Route::group(['prefix' => 'employes'], function () {
    Route::get('/', [EmployeController::class, 'index']);
    Route::post('/', [EmployeController::class, 'store']);
    Route::get('/{id}', [EmployeController::class, 'show']);
    Route::put('/{id}', [EmployeController::class, 'update']);
    Route::delete('/{id}', [EmployeController::class, 'destroy']);
    // Routes spécifiques aux employés
});

Route::group(['prefix' => 'rendezvous'], function () {
    Route::get('/', [RendezVousController::class, 'index']);
    Route::post('/', [RendezVousController::class, 'store']);
    Route::get('/{id}', [RendezVousController::class, 'show']);
    Route::put('/{id}', [RendezVousController::class, 'update']);
    Route::delete('/{id}', [RendezVousController::class, 'destroy']);
    // Routes spécifiques aux rendez-vous
});

Route::group(['prefix' => 'services'], function () {
    Route::get('/', [ServiceController::class, 'index']);
    Route::post('/', [ServiceController::class, 'store']);
    Route::get('/{id}', [ServiceController::class, 'show']);
    Route::put('/{id}', [ServiceController::class, 'update']);
    Route::delete('/{id}', [ServiceController::class, 'destroy']);
    // Routes spécifiques aux services
});

Route::group(['prefix' => 'typeservices'], function () {
    Route::get('/', [TypeServiceController::class, 'index']);
    Route::post('/', [TypeServiceController::class, 'store']);
    Route::get('/{id}', [TypeServiceController::class, 'show']);
    Route::put('/{id}', [TypeServiceController::class, 'update']);
    Route::delete('/{id}', [TypeServiceController::class, 'destroy']);
    // Routes spécifiques aux types de services
});
