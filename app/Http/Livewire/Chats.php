<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Chat;
use App\Models\ChatMensaje;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class Chats extends Component
{
    public $contenido;


    public function mount(Producto $producto){

        /*  Dependiendo de si se ha pasado un producto, o no, comprobaremos si
            existe un chat existente y en caso negativo crearlo si se cumplen
            los requisitos */

        if ($producto->id != null) {

            if ($producto->user_id == Auth::id()) {
                return redirect()->back()->with('error', 'No puedes chatear contigo mismo');
            }

            $parm = Chat::all()->where('producto_id', $producto->id)->where('interesado_id', Auth::id())->first();

            if ($parm != null) {

                $this->contenido = $parm->id;

            } else {
                /*  Al pasarle un producto sin haber hablado antes con su dueño,
                    disponemos a crear el primer mensaje automaticamente y su chat */
                $nuevo = Chat::create([
                        'dueño_id' => $producto->user_id,
                        'interesado_id' => Auth::id(),
                        'producto_id' => $producto->id,
                    ]);

                ChatMensaje::create([
                    'chat_id' => $nuevo->id,
                    'emisor_id' => $nuevo->interesado_id,
                    'receptor_id' => $nuevo->dueño_id,
                    'mensaje' => '¡Me interesa tu producto!',
                ]);

                $this->contenido = $nuevo->id;
            }
        }

    }

    public function cambiarContenido($contenidoNuevo){

        $this->contenido = $contenidoNuevo;

    }

    public function actualizarLista(){



    }


    public function render()
    {
        $usuario = Auth::id();
        $dueño = Chat::all()->whereIn('dueño_id', $usuario);
        $chats = Chat::all()->whereIn('interesado_id', $usuario)->union($dueño);
        /* dd($this); */

        return view('livewire.chats', [
            'chats' => $chats->sortBy('updated_at')
        ]);
    }
}
