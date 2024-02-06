<x-app-layout>
    <div class="container mx-auto p-8 m-4 bg-white">
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
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-40 p-2.5 @error('precio') border-red-500 @enderror"
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
                Fotos
            </label>

            <input type="file" name="foto_1" id="foto_1" accept="image/*"
                    onchange="habilitarSiguiente(this, 'foto_2')">

            <input type="file" name="foto_2" id="foto_2" accept="image/*"
                    onchange="habilitarSiguiente(this, 'foto_3')" class="form-input hidden" disabled>
                    
            <input type="file" name="foto_3" id="foto_3" accept="image/*"
                    onchange="habilitarSiguiente(this, 'foto_4')" class="form-input hidden" disabled>

            <input type="file" name="foto_4" id="foto_4" accept="image/*"
                    onchange="habilitarSiguiente(this, 'foto_5')" class="form-input hidden" disabled>

            <input type="file" name="foto_5" id="foto_5" accept="image/*"
                    class="form-input hidden" disabled>

            @error('foto_1')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
            @error('foto_2')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
            @error('foto_3')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
            @error('foto_4')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
            @error('foto_5')
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
            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Enviar</button>

        <a href="/"
            class="text-white bg-gray-500 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Atrás</a>
    </form>
    </div>

    <script>
        function habilitarSiguiente(inputActual, siguienteInputId) {
            if (inputActual.files.length > 0) {
                document.getElementById(siguienteInputId).classList.remove('hidden');
                document.getElementById(siguienteInputId).disabled = false;
            }
        }
    </script>
    {{-- <div class="container mx-auto p-8">
        <form action="{{ route('productos.store', [], false) }}" method="POST" enctype="multipart/form-data"
              class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-2xl mx-auto bg-white p-8 rounded-md shadow-md">

            @csrf
            @method('POST')

            <!-- Columna 1 -->
            <div>
                <!-- Título del producto -->
                <div class="mb-4">
                    <label for="nombre" class="block text-sm font-medium text-gray-700 mb-2">Título del producto</label>
                    <input type="text" name="nombre" id="nombre"
                           class="form-input w-full @error('nombre') border-red-500 @enderror"
                           value="{{ old('nombre', $producto->nombre) }}">
                    @error('nombre')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Precio -->
                <div class="mb-4">
                    <label for="precio" class="block text-sm font-medium text-gray-700 mb-2">Precio</label>
                    <input type="text" name="precio" id="precio"
                           class="form-input w-full @error('precio') border-red-500 @enderror"
                           value="{{ old('precio', $producto->precio) }}">
                    @error('precio')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Fotos -->
                <div class="mb-4">
                    <label for="foto" class="block text-sm font-medium text-gray-700 mb-2">Fotos</label>

                    <input type="file" name="foto_1" accept="image/*">
                    <input type="file" name="foto_2" accept="image/*">
                    <input type="file" name="foto_3" accept="image/*">
                    <input type="file" name="foto_4" accept="image/*">
                    <input type="file" name="foto_5" accept="image/*">
                    @error('foto_1')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Columna 2 -->
            <div>
                <!-- Categoría -->
                <div class="mb-4">
                    <label for="categoria_id" class="block text-sm font-medium text-gray-700 mb-2">Categoría</label>
                    <select name="categoria_id" id="categoria_id" class="form-select w-full">
                        <option selected></option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->denominacion }}</option>
                        @endforeach
                    </select>
                    @error('categoria_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Estado -->
                <div class="mb-4">
                    <label for="estado_id" class="block text-sm font-medium text-gray-700 mb-2">Estado</label>
                    <select name="estado_id" id="estado_id" class="form-select w-full">
                        <option selected></option>
                        @foreach ($estados as $estado)
                            <option value="{{ $estado->id }}">{{ $estado->tipo }}</option>
                        @endforeach
                    </select>
                    @error('estado_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>



                <!-- Descripción -->
                <div class="mb-4">
                    <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-2">Descripción</label>
                    <textarea name="descripcion" id="descripcion"
                              class="form-textarea w-full @error('descripcion') border-red-500 @enderror"
                              rows="4">{{ old('descripcion', $producto->descripcion) }}</textarea>
                    @error('descripcion')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Botones -->
            <div class="flex justify-end col-span-2">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Enviar</button>
                <a href="/" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Atrás</a>
            </div>
        </form>
    </div> --}}
</x-app-layout>
