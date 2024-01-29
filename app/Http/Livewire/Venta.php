<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Venta extends Component
{
    public function render()
    {
        $productos = Producto::all()->where('user_id', Auth::user()->id)->whereNull('vendido');
        return view('livewire.venta', [
            'productos' => $productos
        ]);
    }
}
