<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EnVenta extends Component
{
    public $productos;

    public function render()
    {
        return view('livewire.en-venta');
    }
}
