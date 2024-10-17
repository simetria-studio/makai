<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\DocsClientesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;

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

Route::middleware('auth')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UsersController::class, 'show'])->name('users.show');
    Route::get('/users-edit/{user}', [UsersController::class, 'edit'])->name('users.edit');
    Route::post('/users-update/{user}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/users-delete/{user}', [UsersController::class, 'destroy'])->name('users.destroy');
    Route::get('/users-create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/users-store', [UsersController::class, 'store'])->name('users.store');

    Route::get('/users-permissions-create', [UsersController::class, 'permissions'])->name('users.permissions');
    Route::post('/users/{user}/permissions', [UsersController::class, 'updatePermissions'])->name('users.permissions.update');

    Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes.index');
    Route::get('/clientes/{cliente}', [ClientesController::class, 'show'])->name('clientes.show');
    Route::get('/clientes-edit/{cliente}', [ClientesController::class, 'edit'])->name('clientes.edit');
    Route::post('/clientes-update/{cliente}', [ClientesController::class, 'update'])->name('clientes.update');
    Route::delete('/clientes-delete/{cliente}', [ClientesController::class, 'destroy'])->name('clientes.destroy');
    Route::get('/clientes-create', [ClientesController::class, 'create'])->name('clientes.create');
    Route::post('/clientes-store', [ClientesController::class, 'store'])->name('clientes.store');

    Route::get('/clientes-docs/{cliente}', [DocsClientesController::class, 'create'])->name('clientes.docs');
    Route::post('/clientes-docs-store/{cliente}', [DocsClientesController::class, 'store'])->name('clientes.docs.store');

    Route::get('/doc_tipos', [DocsClientesController::class, 'tipoDocs'])->name('doc_tipos.index');
    Route::get('/docs-tipo-create', [DocsClientesController::class, 'docTipoCreate'])->name('docs.tipo.create');
    Route::post('/docs-tipo-store', [DocsClientesController::class, 'docTipoStore'])->name('docs.tipo.store');
    Route::get('/docs-tipo-edit/{docTipo}', [DocsClientesController::class, 'docTipoEdit'])->name('docs.tipo.edit');
    Route::post('/docs-tipo-update/{docTipo}', [DocsClientesController::class, 'docTipoUpdate'])->name('docs.tipo.update');
    Route::delete('/docs-tipo-delete/{docTipo}', [DocsClientesController::class, 'docTipoDestroy'])->name('docs.tipo.destroy');
    // Route::get('/docs-tipo-show/{docTipo}', [DocsClientesController::class, 'docTipoShow'])->name('docs.tipo.show');

});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__ . '/auth.php';
