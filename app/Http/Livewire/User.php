<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\Producto;
use App\Models\User as ModelsUser;
use Livewire\Component;


class User extends Component
{
    public $componente = 'venta';

    public $usuario;

    public function mount(ModelsUser $user){

        $this->usuario = $user;

    }

    public function render()
    {
        //dd($this->usuario);
        return view('livewire.user', [
            'perfil' => $this->usuario,
            'yo' => Auth::id(),
        ]);
    }

    public function cambiarComponente($componenteHijo)
    {
        $this->componente = $componenteHijo;
    }



}
