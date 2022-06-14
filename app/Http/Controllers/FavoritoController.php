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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.favs', [
            'productos' => Auth::user()->favoritos,
            'perfil' => Auth::user(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Producto $producto)
    {
        $favorito = new Favorito();
        $favorito->user_id = Auth::user()->id;
        $favorito->producto_id = $producto->id;
        $favorito->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favorito  $favorito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favorito $favorito)
    {
        $favorito->delete();
        return redirect()->back();
    }
}
