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
            'precio' => 'required|numeric|min:1|max:99999',
            'foto_1' => 'required|image|mimes:png,jpg|max:5000',
            'foto_2' => 'image|mimes:png,jpg|max:5000',
            'foto_3' => 'image|mimes:png,jpg|max:5000',
            'foto_4' => 'image|mimes:png,jpg|max:5000',
            'foto_5' => 'image|mimes:png,jpg|max:5000',
            'descripcion' => 'required|string',
        ];
    }
}
