<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMensaje extends Model
{
    use HasFactory;

    protected $table = 'chat_mensajes';
    protected $fillable = ['chat_id', 'emisor_id', 'receptor_id', 'mensaje'];

    //public $incrementing = false;

    public function chat()
    {
        return $this->belongsTo(Chat::class, 'chat_id');
    }

}
