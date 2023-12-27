<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Categoria;
use App\Models\Estado;
use App\Models\Producto;
use App\Models\ProductoFoto;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parm = request('');
        $productos = Producto::where('nombre', 'like', "%$parm%")->get();
        return view('productos.index', [
            'productos' => $productos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $usuario = Auth::user($user);
        $producto = new Producto();
        $categorias = Categoria::all();
        $estados = Estado::all();

        return view('productos.create', [
            'producto' => $producto,
            'usuario' => $usuario,
            'categorias' => $categorias,
            'estados' => $estados
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductoRequest $request)
    {
        //Creación del producto
        $validados = $request->validated();
        $producto = new Producto($validados);
        $producto->save();

        //Añadir imagen al producto
        $imagen = $validados['foto']->store("public/prod/{$producto->id}");
        $url = Storage::url($imagen);

        ProductoFoto::create([
            'producto_id' => $producto->id,
            'foto_1' => $url,
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('productos.show', [
            'producto' => $producto,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductoRequest  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
