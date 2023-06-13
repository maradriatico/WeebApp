<?php

namespace App\Http\Livewire;

use App\Models\Chat as ModelsChat;
use App\Models\ChatMensaje;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Pusher\Pusher;
use App\Events\enviar;


class Chat extends Component
{
    public $emisorId;
    public $receptorId;
    public $productoId;
    public $mensaje;
    public $conver;
    public $mensajes = [];


    public function mount($receptorId, $productoId, $conver)
    {
        $this->emisorId = Auth::id();
        $this->receptorId = $receptorId;
        $this->productoId = $productoId;
        $this->conver = $conver;

        $this->actualizar();
    }

    public function actualizar()
    {
        $chat = ModelsChat::where('id', $this->conver)->first();

        if ($chat) {

            $this->mensajes = $chat->mensajes()->orderBy('created_at')->get();
        }

        //Event::listen(enviar::class, function ($event) {

           /*  $mensaje = $event->mensaje;
            $this->emit('enviar', $mensaje); */



        //event(new enviar($mensaje));

    }

    public function enviar()
    {
        //$this->validate(['mensaje' => 'required']);

        //$chat = ModelsChat::all()->whereIn('id', $this->conver)[1];
        $chat = ModelsChat::where('id', $this->conver)->first();

        $mensaje = new ChatMensaje([
            'chat_id' => $chat->id,
            'emisor_id' => $this->emisorId,
            'receptor_id' => $this->receptorId,
            'mensaje' => $this->mensaje,
        ]);

        $chat->mensajes()->save($mensaje);

        event(new enviar($mensaje));


        //$mensajes = $chat->mensajes()->orderBy('created_at')->get();

        //$this->emitTo('chat', 'actualizar', $mensajes->toArray());


        $pusher = new Pusher(
            config('broadcasting.connections.pusher.key'),
            config('broadcasting.connections.pusher.secret'),
            config('broadcasting.connections.pusher.app_id'),
            config('broadcasting.connections.pusher.options')
        );

        $pusher->trigger('chat-channel', 'message-sent', ['mensaje' => $mensaje]);

        $this->mensaje = '';
    }

    public function render()
    {
        return view('livewire.chat', ['mensajes' => $this->mensajes]);
    }


}
