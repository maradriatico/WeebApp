<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Vendidos extends Component
{
    public function render()
    {
        $productos = Producto::all()->where('user_id', Auth::user()->id)->where('vendido', true);
        return view('livewire.vendidos', [
            'productos' => $productos
        ]);
    }
}
