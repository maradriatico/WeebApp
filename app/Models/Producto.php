<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    public $fillable = ['nombre', 'precio', 'descripcion',
                        'categoria_id', 'estado_id', 'user_id'];

    public function favoritos()
    {
        return $this->hasMany(Favorito::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function fotos()
    {
        return $this->hasOne(ProductoFoto::class, 'producto_id');
    }
}
