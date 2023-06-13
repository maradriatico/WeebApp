<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Http\Livewire\Venta;
use App\Http\Livewire\Vendidos;

class User extends Component
{
    public $perfil;
    public $componente;
    public $componenteActual;


    public function cambiarComponente($nuevoComponente)
         {
            //dd($this->componente);
            //$this->componenteActual = $nuevoComponente;
            $this->emitTo('vendidos', 'setComponente', $nuevoComponente);
         }

    public function render()
    {
        return view('livewire.user', [
            'productos' => Auth::user()->productos,
        ]);
    }



}
