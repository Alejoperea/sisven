<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PaymodeController;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//Ruta categorias
 Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
 Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
 Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
 Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
 Route::put('/categorias/{categoria}', [CategoriaController::class, 'update'])->name('categorias.update');
 Route::get('/categorias/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');

 //Ruta paymode
 Route::get('/paymodes', [PaymodeController::class,'index'])->name('paymodes.index');
Route::post('/paymodes', [PaymodeController::class, 'store'])->name('paymodes.store');
Route::get('/paymodes/create', [PaymodeController::class, 'create'])->name('paymodes.create');
Route::delete('/paymodes/{paymode}', [PaymodeController::class, 'destroy'])->name('paymodes.destroy');
Route::put('/paymodes/{paymode}', [PaymodeController::class, 'update'])->name('paymodes.update');
Route::get('/paymodes/{paymode}/edit', [PaymodeController::class, 'edit'])->name('paymodes.edit');
});
Route::get('/customers', [CustomerController::class,'index'])->name('customers.index');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');



require __DIR__.'/auth.php';
