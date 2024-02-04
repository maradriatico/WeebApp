<?php

namespace App\Http\Livewire;

use App\Models\Favorito;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Favoritos extends Component
{
    public $productos;

    public function mount(){

        $this->productos = Favorito::all()->where('user_id', Auth::id());
    }

    public function render()
    {
        return view('livewire.favoritos');
    }
}
