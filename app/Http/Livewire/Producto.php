<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Estado;
use App\Models\Producto as ModelsProducto;
use Livewire\Component;
use Livewire\WithPagination;

class Producto extends Component
{
    use WithPagination;

    public $search;
    public $categoria;
    public $estado;
    public $productos;

    public function mount(){

        $this->productos = ModelsProducto::whereNull('vendido')->orderBy('created_at')->get();

    }

    public function actualizarBusqueda()
    {
        if ($this->search){
            $this->productos = $this->productos->where('nombre', $this->search);
        } else {
            $this->mount();
        }

        if ($this->categoria) {
            $this->productos = $this->productos->where('categoria_id', $this->categoria);
        }

        if ($this->estado) {
            $this->productos = $this->productos->where('estado_id', $this->categoria);
        }


        $this->resetPage();
    }

    public function limpiar(){

        $this->search = null;
        $this->categoria = null;
        $this->estado = null;
        $this->productos = ModelsProducto::whereNull('vendido')->get();
        $this->resetPage();

    }

    public function render()
    {
        return view('livewire.producto', [
            'lcategorias' => Categoria::all(),
            'lestados' => Estado::all()

        ]);
    }
}
