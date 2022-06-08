<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class User extends Component
{

    public function render()
    {
        return view('users.index', [
            'productos' => Auth::user()->productos,
        ]);
    }
}
