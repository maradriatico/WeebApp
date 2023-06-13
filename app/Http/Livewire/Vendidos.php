<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Vendidos extends Component
{
    public $productos;
    public $componente;

    protected $listeners = ['setComponente'];

    public function setComponente($nuevoComponente){

        $this->componente = $nuevoComponente;
        //dd($nuevoComponente);

    }

    public function render()
    {
        return view('livewire.vendidos');
    }
}
