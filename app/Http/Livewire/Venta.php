<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Venta extends Component
{
    public $perfil;

    public function mount(User $perfil){

        $this->perfil = $perfil;

    }

    public function render()
    {
        //dd($this->perfil);
        $productos = Producto::all()->where('user_id', $this->perfil->id)->whereNull('vendido');
        return view('livewire.venta', [
            'productos' => $productos
        ]);
    }
}
