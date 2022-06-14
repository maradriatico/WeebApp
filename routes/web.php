<?php

use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\User;
use App\Models\Favorito;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('user', UserController::class)
->middleware(['auth']);

Route::get('/favoritos/create/{producto}', [FavoritoController::class, 'create'])->middleware(['auth']);

Route::resource('favoritos', FavoritoController::class)->middleware(['auth']);

Route::resource('productos', ProductoController::class)->middleware(['auth']);

//Route::get('/usser', User::class);


require __DIR__.'/auth.php';
