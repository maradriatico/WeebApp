<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoFoto extends Model
{
    use HasFactory;

    protected $table = 'producto_fotos';

    protected $fillable = ['producto_id', 'foto_1', 'foto_2', 'foto_3', 'foto_4', 'foto_5'];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id');
    }
}
