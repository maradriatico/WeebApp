<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Chat extends Model
{
    use HasFactory;

    protected $table = 'chats';
    protected $fillable = ['dueño_id','interesado_id', 'producto_id'];

    // public function users()
    // {
    //     return $this->belongsToMany(User::class/* , 'chat_mensajes', 'id', 'user_id' */);
    // }

    public function dueño()
    {
        return $this->belongsTo(User::class, 'dueño_id');
    }

    public function interesado()
    {
        return $this->belongsTo(User::class, 'interesado_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function mensajes()
    {
        return $this->hasMany(ChatMensaje::class, 'chat_id', 'id');
    }

    public function otro()
    {
        //Un remedio para evitar el belongsToMany

        if ($this->dueño->id == Auth::user()->id) {

            return $this->belongsTo(User::class, 'interesado_id');

        } else {

            return $this->belongsTo(User::class, 'dueño_id');
        };
    }
}
