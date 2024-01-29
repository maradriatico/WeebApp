<?php

use App\Http\Controllers\ChatMensajeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Padre;
use App\Http\Livewire\User;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect()->route('register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('productos', ProductoController::class)->middleware(['auth']);

Route::get('/productos/{producto}/marcar', [ProductoController::class, 'marcar']);

Route::get('/productos/{producto}/vender', [ProductoController::class, 'vender']);

Route::resource('user', UserController::class)->middleware(['auth']);

Route::get('/user', User::class)->middleware(['auth']);

Route::resource('chat', ChatMensajeController::class)->middleware(['auth']);



require __DIR__.'/auth.php';
