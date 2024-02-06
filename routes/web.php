<?php

use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Chats;
use App\Http\Livewire\Favoritos;
use App\Http\Livewire\Producto;
use App\Http\Livewire\User;
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

Route::get('/productos', Producto::class)->middleware(['auth']);

Route::get('/productos/{producto}/marcar', [ProductoController::class, 'marcar'])->middleware(['auth']);
Route::get('/productos/{producto}/vender', [ProductoController::class, 'vender'])->middleware(['auth']);

Route::get('/favoritos', Favoritos::class)->middleware(['auth']);
Route::get('/favoritos/{producto}/create', [FavoritoController::class, 'create'])->middleware(['auth']);
Route::get('/favoritos/{producto}/destroy', [FavoritoController::class, 'destroy'])->middleware(['auth']);

Route::get('/user/{user}', User::class)->middleware(['auth']);

Route::get('/chat', Chats::class)->middleware(['auth']);
Route::get('/chat/{producto}', Chats::class)->middleware(['auth']);



require __DIR__.'/auth.php';
