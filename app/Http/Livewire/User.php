<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\Producto;
use Livewire\Component;


class User extends Component
{
    public $componente = 'venta';

    public function render()
    {
        return view('livewire.user', [
            'perfil' => Auth::user(),
        ]);
    }

    public function cambiarComponente($componenteHijo)
    {
        $this->componente = $componenteHijo;
    }



}
