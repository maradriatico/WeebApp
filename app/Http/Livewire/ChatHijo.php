<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use App\Models\ChatMensaje;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatHijo extends Component
{
    public $contenido;
    public $mensajes = [];
    public $mensaje;
    public $emisorId;
    public $receptorId;
    public $productoId;

    public function mount()
    {
        $chat = Chat::all()->firstWhere('id', $this->contenido);
        $this->emisorId = Auth::id();
        $this->receptorId = $chat->otro->id;;
        $this->productoId = $chat->producto_id;
        $this->actualizar();
    }

    public function actualizar()
    {
        $chat = Chat::all()->firstWhere('id', $this->contenido);

        if ($chat) {

            $this->mensajes = $chat->mensajes()->orderBy('created_at')->get();
        }

    }

    public function enviar()
    {
        $chat = Chat::all()->firstWhere('id', $this->contenido);
        $mensaje = new ChatMensaje([
            'chat_id' => $chat->id,
            'emisor_id' => $this->emisorId,
            'receptor_id' => $this->receptorId,
            'mensaje' => $this->mensaje,
        ]);

        $chat->mensajes()->save($mensaje);
        $this->actualizar();
        $this->mensaje = '';
    }

    public function render()
    {
        $chat = Chat::all()->firstWhere('id', $this->contenido);
        $yo = Auth::id();

        return view('livewire.chat-hijo', [
            'chat'=> $chat,
            'yo' => $yo,
        ]);
    }
}
