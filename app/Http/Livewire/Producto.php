<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Producto extends Component
{
    public $productos;
    
    public function render()
    {
        return view('livewire.producto');
    }
}
