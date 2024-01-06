<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombre' => 'required|string|max:30',
            'user_id' => 'required|exists:users,id',
            'categoria_id' => 'required|exists:categorias,id',
            'estado_id' => 'required|exists:estados,id',
            'precio' => 'required|numeric', //minimo y maximo
            'foto_1' => 'required|image',
            'foto_2' => 'image',
            'foto_3' => 'image',
            'foto_4' => 'image',
            'foto_5' => 'image',
            'descripcion' => 'required|string',
        ];
    }
}
