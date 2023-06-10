<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Vendidos extends Component
{
    public $productos;
    
    public function render()
    {
        return view('livewire.vendidos');
    }
}
