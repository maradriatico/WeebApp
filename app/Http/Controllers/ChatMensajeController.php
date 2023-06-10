<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChatMensajeRequest;
use App\Http\Requests\UpdateChatMensajeRequest;
use App\Models\ChatMensaje;

class ChatMensajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\ChatMensaje  $chatMensaje
     * @return \Illuminate\Http\Response
     */
    public function show(ChatMensaje $chatMensaje)
    {
        //
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
