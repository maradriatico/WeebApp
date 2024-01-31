<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatPadre extends Component
{
    public $contenido;
    public $conver;

    /* public function mount(){

        $usuario = Auth::id();
        $dueño = Chat::all()->whereIn('dueño_id', $usuario);
        $this->conver = Chat::all()->whereIn('interesado_id', $usuario)->union($dueño);
        //dd($this);

    } */

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

        return view('livewire.chat-padre', [
            'chats' => $chats
        ]);
    }


}
