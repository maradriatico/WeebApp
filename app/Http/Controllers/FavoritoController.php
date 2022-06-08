<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFavoritoRequest;
use App\Http\Requests\UpdateFavoritoRequest;
use App\Models\Favorito;

class FavoritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFavoritoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFavoritoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Favorito  $favorito
     * @return \Illuminate\Http\Response
     */
    public function show(Favorito $favorito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favorito  $favorito
     * @return \Illuminate\Http\Response
     */
    public function edit(Favorito $favorito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFavoritoRequest  $request
     * @param  \App\Models\Favorito  $favorito
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFavoritoRequest $request, Favorito $favorito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favorito  $favorito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favorito $favorito)
    {
        //
    }
}
