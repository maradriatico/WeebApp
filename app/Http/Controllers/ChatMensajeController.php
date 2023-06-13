<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreChatMensajeRequest;
use App\Http\Requests\UpdateChatMensajeRequest;
use App\Models\Chat;
use App\Models\ChatMensaje;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatMensajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Auth::id();
        //$chats = DB::select("select chat_id from chat_mensajes where emisor_id = $usuario or receptor_id = $usuario group by chat_id");
        //$chats = DB::table('chats')->where('dueño_id', $usuario)->where('interesado_id', $usuario)->groupBy('id')->get();
        $dueño = Chat::all()->whereIn('dueño_id', $usuario);
        $chats = Chat::all()->whereIn('interesado_id', $usuario)->union($dueño);

        //$chats = Chat::all();
        //dd($chats);

        return view('chats.index', [
            'chats' => $chats
        ]);
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
     * @param  \App\Http\Requests\StoreChatMensajeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChatMensajeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $chat)
    {
        $emisorId = Auth::id();
        $receptorId = $chat->otro->id;
        $productoId = $chat->producto_id;
        //dd($emisorId, $receptorId, $productoId);
        //dd($chat);

        return view('chats.show', [
            'productoId' => $productoId,
            'receptorId' => $receptorId,
            'emisorId' => $emisorId,
            'conver' => $chat->id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChatMensaje  $chatMensaje
     * @return \Illuminate\Http\Response
     */
    public function edit(ChatMensaje $chatMensaje)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChatMensajeRequest  $request
     * @param  \App\Models\ChatMensaje  $chatMensaje
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChatMensajeRequest $request, ChatMensaje $chatMensaje)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChatMensaje  $chatMensaje
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChatMensaje $chatMensaje)
    {
        //
    }
}
