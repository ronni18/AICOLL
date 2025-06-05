<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;

Route::prefix('empresas')->group(function () {
    Route::post('/', [EmpresaController::class, 'store']);
    Route::put('/{nit}', [EmpresaController::class, 'update']);
    Route::get('/{nit}', [EmpresaController::class, 'show']);
    Route::get('/', [EmpresaController::class, 'index']);
    Route::delete('/inactivos', [EmpresaController::class, 'deleteInactivos']);
});

