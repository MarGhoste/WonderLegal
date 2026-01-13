<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaseContractController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

// Ruta principal: Carga el formulario con los datos actuales
Route::get('/contrato-arrendamiento', [LeaseContractController::class, 'edit'])
    ->name('lease.edit');

// Ruta de actualización: Guarda los cambios cada vez que el usuario termina de editar
Route::put('/contrato-arrendamiento/{leaseContract}', [LeaseContractController::class, 'update'])
    ->name('lease.update');
