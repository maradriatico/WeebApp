<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Vendidos extends Component
{
    public $vendidos;
    
    public function render()
    {
        return view('livewire.vendidos');
    }
}
