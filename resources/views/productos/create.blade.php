<x-productos>
    <form action="{{ route('productos.store', [], false) }}" method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="mb-6">
            <label for="nombre"
                class="text-sm font-medium text-gray-900 block mb-2 @error('nombre') text-red-500 @enderror">
                Título del producto
            </label>
            <input type="text" name="nombre" id="nombre"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5 @error('nombre') border-red-500 @enderror"
                value="{{ old('nombre', $producto->nombre) }}">
            @error('nombre')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <input type="hidden" name="user_id" id="user_id" value="{{ $usuario->id }}">

        <div class="mb-6">
            <label for="categoria_id"
                class="text-sm font-medium text-gray-900 block mb-2 @error('categoria_id') text-red-500 @enderror">
                Categoria
            </label>
            <select type="text" name="categoria_id" id="categoria_id" value="{{ old('$producto->categoria->denominacion', $producto->categoria_id)}}">
                <option selected></option>
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->denominacion}}</option>
                @endforeach
        </select>
            @error('categoria_id')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="precio"
                class="text-sm font-medium text-gray-900 block mb-2 @error('precio') text-red-500 @enderror">
                Precio
            </label>
            <input type="text" name="precio" id="precio"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5 @error('precio') border-red-500 @enderror"
                value="{{ old('precio', $producto->precio) }}">
            @error('precio')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="estado_id"
                class="text-sm font-medium text-gray-900 block mb-2 @error('estado_id') text-red-500 @enderror">
                Estado
            </label>
            <select type="text" name="estado_id" id="estado_id" value="{{ old('$producto->estado->tipo', $producto->estado_id)}}">
                <option selected></option>
                @foreach ($estados as $estado)
                    <option value="{{$estado->id}}">{{$estado->tipo}}</option>
                @endforeach
            </select>
            @error('estado_id')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="Foto"
                class="text-sm font-medium text-gray-900 block mb-2 @error('Foto') text-red-500 @enderror">
                Foto
            </label>

            <input type="file" name="foto" accept="image/*">
            <input type="file" name="foto" accept="image/*">
            <input type="file" name="foto" accept="image/*">

            @error('foto')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="descripcion"
                class="text-sm font-medium text-gray-900 block mb-2 @error('descripcion') text-red-500 @enderror">
                Descripcion
            </label>
            <textarea name="descripcion" id="descripcion"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5 @error('descripcion') border-red-500 @enderror"
                value="{{ old('descripcion', $producto->descripcion) }}">
            </textarea>
            @error('descripcion')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Enviar</button>

        <a href="/"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Atrás</a>
    </form>
</x-productos>
