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

            //$comprobar = $request->file('foto_1');
            //return $comprobar[0];

        $validados = $request->validated();
            //dd($validados);

        $producto = new Producto($validados);
        $producto->save();

        //Añadir imagen al producto

                            //OPTIMIZAR CON BUCLES
        $url_2 = '';
        $url_3 = '';
        $url_4 = '';
        $url_5 = '';

        $foto_1 = $validados['foto_1']->store("public/prod/{$producto->id}");
        $url_1 = Storage::url($foto_1);

        if (array_key_exists("foto_2", $validados) ) {
            $foto_2 = $validados['foto_2']->store("public/prod/{$producto->id}");
            $url_2 = Storage::url($foto_2);
        }

        if (array_key_exists("foto_3", $validados) ) {
            $foto_3 = $validados['foto_3']->store("public/prod/{$producto->id}");
            $url_3 = Storage::url($foto_3);
        }

        if (array_key_exists("foto_4", $validados) ) {
            $foto_4 = $validados['foto_4']->store("public/prod/{$producto->id}");
            $url_4 = Storage::url($foto_4);
        }

        if (array_key_exists("foto_5", $validados) ) {
            $foto_5 = $validados['foto_5']->store("public/prod/{$producto->id}");
            $url_5 = Storage::url($foto_5);
        }


        ProductoFoto::create([
            'producto_id' => $producto->id,
            'foto_1' => $url_1,
            'foto_2' => $url_2,
            'foto_3' => $url_3,
            'foto_4' => $url_4,
            'foto_5' => $url_5,
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
