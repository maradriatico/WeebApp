<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Categoria;
use App\Models\Estado;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parm = request('s');
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
        $validados = $request->validated();
        //dd($validados);
        $producto = new Producto($validados);
        //dd($producto);
        $producto->save();

        return redirect()->route('user.index');

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
            'producto' => $producto
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
        $usuario = Auth::user();
        $categorias = Categoria::all();
        $estados = Estado::all();



        return view('productos.edit', [
            'producto' => $producto,
            'usuario' => $usuario,
            'categorias' => $categorias,
            'estados' => $estados
        ]);
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
        $validados = $request->validated();
        $producto->nombre = $validados['nombre'];
        $producto->categoria_id = $validados['categoria_id'];
        $producto->precio = $validados['precio'];
        $producto->estado_id = $validados['estado_id'];
        $producto->descripcion = $validados['descripcion'];

        $producto->save();
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('user.index');
    }
}
