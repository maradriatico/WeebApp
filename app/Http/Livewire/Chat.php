<?php

namespace App\Http\Livewire;

use App\Models\Chat as ModelsChat;
use App\Models\ChatMensaje;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chat extends Component
{
    public $emisorId;
    public $receptorId;
    public $productoId;
    public $mensaje;
    public $conver;

    public function mount($receptorId, $productoId, $conver)
    {
        $this->emisorId = Auth::id();
        $this->receptorId = $receptorId;
        $this->productoId = $productoId;
        $this->conver = $conver;
    }

    public function render()
    {
        $chat = ModelsChat::all()->whereIn('id', $this->conver)[1];

        //dd($chat->mensajes());

        $mensajes = [];

        if ($chat) {
            $mensajes = $chat->mensajes()->orderBy('created_at')->get();
        }


        return view('livewire.chat', ['mensajes' => $mensajes]);
    }

    public function enviar()
    {
        $this->validate(['mensaje' => 'required']);

        $chat = ModelsChat::all()->whereIn('id', $this->conver)[1];

        // if (!$chat) {
        //     $chat = ModelsChat::create(['producto_id' => $this->productoId]);
        //     $chat->users()->attach([$this->emisorId, $this->receptorId]);
        // }

        ChatMensaje::create([
            'chat_id' => $chat->id,
            'emisor_id' => $this->emisorId,
            'receptor_id' => $this->receptorId,
            'mensaje' => $this->mensaje,
        ]);

        $this->mensaje = '';
    }


}
