<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMensaje extends Model
{
    use HasFactory;

    protected $fillable = ['user1_id', 'user2_id', 'producto_id', 'emisor_id', 'receptor_id', 'mensaje'];

    //public $incrementing = false;

    public function chat()
    {
        return $this->belongsTo(ChatMensaje::class, ['user1_id', 'user2_id', 'producto_id'])
                                             ->with(['user1', 'user2', 'producto']);
    }

    public function user1()
    {
        return $this->belongsTo(User::class, 'user1_id');
    }

    public function user2()
    {
        return $this->belongsTo(User::class, 'user2_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
