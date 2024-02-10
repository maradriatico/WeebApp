<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Categoria;
use App\Models\Chat;
use App\Models\ChatMensaje;
use App\Models\Estado;
use App\Models\Producto;
use App\Models\ProductoFoto;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
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

                            //OPTIMIZAR CON BUCLES
        $url_2 = null;
        $url_3 = null;
        $url_4 = null;
        $url_5 = null;

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

        return redirect('/productos')->with('success', 'Producto creado con éxito');
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

        if ($producto->user_id == Auth::id()) {

            return view('productos.edit', [
                'producto' => $producto,
                'imagenes' => $producto->fotos,
                'categorias' => Categoria::all(),
                'estados' => Estado::all(),
            ]);
        }

        return redirect()->back()->with('error', 'No puedes editar un producto que no es tuyo');

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
        //dd($request->validated());
        $validados = $request->validated();
        // Actualizamos el producto
        $producto->fill($validados);
        $producto->save();

        //Actualizamos las fotos

        $url_1 = $producto->fotos->foto_1;
        $url_2 = $producto->fotos->foto_2;
        $url_3 = $producto->fotos->foto_3;
        $url_4 = $producto->fotos->foto_4;
        $url_5 = $producto->fotos->foto_5;

                    //Primera foto

        if (array_key_exists("cambio_1", $validados) ) {
            $cambio_1 = $validados['cambio_1']->store("public/prod/{$producto->id}");
            $url_1 = Storage::url($cambio_1);
        }
                    //Segunda foto

        if (array_key_exists("foto_2", $validados) ) {
            $foto_2 = $validados['foto_2']->store("public/prod/{$producto->id}");
            $url_2 = Storage::url($foto_2);
        }

        if (array_key_exists("cambio_2", $validados) ) {
            $cambio_2 = $validados['cambio_2']->store("public/prod/{$producto->id}");
            $url_2 = Storage::url($cambio_2);
        }
                    //Tercera foto

        if (array_key_exists("foto_3", $validados) ) {
            $foto_3 = $validados['foto_3']->store("public/prod/{$producto->id}");
            $url_3 = Storage::url($foto_3);
        }

        if (array_key_exists("cambio_3", $validados) ) {
            $cambio_3 = $validados['cambio_3']->store("public/prod/{$producto->id}");
            $url_3 = Storage::url($cambio_3);
        }

                    //Cuarta foto

        if (array_key_exists("foto_4", $validados) ) {
            $foto_4 = $validados['foto_4']->store("public/prod/{$producto->id}");
            $url_4 = Storage::url($foto_4);
        }

        if (array_key_exists("cambio_4", $validados) ) {
            $cambio_4 = $validados['cambio_4']->store("public/prod/{$producto->id}");
            $url_4 = Storage::url($cambio_4);
        }

                     //Quinta foto

        if (array_key_exists("foto_5", $validados) ) {
            $foto_5 = $validados['foto_5']->store("public/prod/{$producto->id}");
            $url_5 = Storage::url($foto_5);
        }

        if (array_key_exists("cambio_5", $validados) ) {
            $cambio_5 = $validados['cambio_5']->store("public/prod/{$producto->id}");
            $url_5 = Storage::url($cambio_5);
        }

        $imagen = ProductoFoto::find($producto->fotos->id);


        $imagen->fill([
            'foto_1' => $url_1,
            'foto_2' => $url_2,
            'foto_3' => $url_3,
            'foto_4' => $url_4,
            'foto_5' => $url_5,
        ]);

        $imagen->save();


        return redirect()->back()->with('success', 'Producto editado con éxito');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        if($producto->vendido){

            return redirect()->back()->with('error', 'Debiste haber puesto que se borrase todo en cascada');

        }

        return redirect()->back()->with('error', 'Primero debes marcar al producto como Vendido');
    }

    public function marcar(Producto $producto)
    {
        //Comprobaciones
        if (Auth::user() != $producto->user) {
            return redirect('/user')->with('error', 'No eres el propietario de ese producto');
        }

        $chats = Chat::all()->where('producto_id', $producto->id);

        return view('productos.marcar', [
            'producto' => $producto,
            'chats' => $chats,
        ]);
    }


    public function vender(Producto $producto)
    {
        //Pendiente de darle utilidad al usuario comprador

        $producto->vendido = true;
        $producto->save();
        return redirect("/user/$producto->user_id")->with('success', 'Producto marcado como vendido');

    }

}
