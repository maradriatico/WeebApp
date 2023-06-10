<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Venta extends Component
{
    public $productos;
    
    public function render()
    {
        return view('livewire.venta');
    }
}
