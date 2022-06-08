<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Buscados extends Component
{
    public $productos;

    public function render()
    {
        return view('livewire.buscados');
    }
}
