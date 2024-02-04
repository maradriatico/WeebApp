<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFavoritoRequest;
use App\Http\Requests\UpdateFavoritoRequest;
use App\Models\Favorito;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class FavoritoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Producto $producto)
    {
        if ($producto->user_id != Auth::id()) {

            if ($producto->esFavorito()) {

                return back()->with('error', 'Este producto ya se encuentra en tus Favoritos');
            }
            
            Favorito::create([
                'user_id' => Auth::id(),
                'producto_id' => $producto->id,
            ]);

            return back()->with('success', 'Producto añadido a Favoritos');
        }

        return back()->with('error', 'No puedes añadir a Favoritos tu propio producto');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favorito  $favorito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        if ($producto->esFavorito()) {

            $favorito = $producto->favoritos->where('user_id', Auth::id())->first();
            $favorito->delete();
            return back()->with('success', 'Producto eliminado de Favoritos');

        } else {
            return back()->with('error', 'El producto seleccionado no está en un lista de Favoritos');
        }
    }
}
