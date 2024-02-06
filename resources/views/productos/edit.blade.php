<x-app-layout>
<div class="container mx-auto p-8 m-4 bg-white">
    <form action="{{ route('productos.update', [$producto->id], false) }}" method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')
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

        <input type="hidden" name="user_id" id="user_id" value="{{ $producto->user_id }}">


        <div class="mb-6">
            <label for="categoria_id"
                class="text-sm font-medium text-gray-900 block mb-2 @error('categoria_id') text-red-500 @enderror">
                Categoria
            </label>
            <select type="text" name="categoria_id" id="categoria_id" value="{{ old('categoria_id', $producto->categoria_id)}}">
                <option selected class="bg-gray-300" value="{{$producto->categoria_id}}">{{$producto->categoria->denominacion}}</option>
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
            <select type="text" name="estado_id" id="estado_id" value="{{ old('estado_id', $producto->estado_id)}}">
                <option selected class="bg-gray-300" value="{{$producto->estado_id}}">{{$producto->estado->tipo}}</option>
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
            <label for="Foto" class="text-sm font-medium text-gray-900 block mb-2 @error('Foto') text-red-500 @enderror">
                Fotos
            </label>
            <div class="flex  justify-between">
                <div>
                    @if ($imagenes->foto_1)

                    <label for="cambio_1">
                      <img src="{{ asset( $imagenes->foto_1) }}" class="w-20"/>
                    </label>

                    <input name="cambio_1" id="cambio_1" type="file" class=" hidden" />

                    @endif
                </div>

                <div>
                    @if ($imagenes->foto_2)

                    <label for="cambio_2">
                      <img src="{{ asset( $imagenes->foto_2) }}" class="w-20"/>
                    </label>

                    <input name="cambio_2" id="cambio_2" type="file" class=" hidden" />
                    @else

                    <input type="file" name="foto_2" id="foto_2" accept="image/*">

                    @endif
                </div>
                <div>
                    @if ($imagenes->foto_3)

                    <label for="cambio_3">
                      <img src="{{ asset( $imagenes->foto_3) }}" class="w-20"/>
                    </label>

                    <input name="cambio_3" id="cambio_3" type="file" class=" hidden" />
                    @else

                    <input type="file" name="foto_3" id="foto_3" accept="image/*">

                    @endif
                </div>
                <div>
                    @if ($imagenes->foto_4)

                    <label for="cambio_4">
                      <img src="{{ asset( $imagenes->foto_4) }}" class="w-20"/>
                    </label>

                    <input name="cambio_4" id="cambio_4" type="file" class=" hidden" />
                    @else

                    <input type="file" name="foto_4" id="foto_4" accept="image/*">

                    @endif

                </div>

                <div>
                    @if ($imagenes->foto_5)

                    <label for="cambio_5">
                      <img src="{{ asset( $imagenes->foto_5) }}" class="w-20"/>
                    </label>

                    <input name="cambio_5" id="cambio_5" type="file" class=" hidden" />
                    @else

                    <input type="file" name="foto_5" id="foto_5" accept="image/*">

                    @endif

                </div>
            </div>
            {{-- <input type="file" name="foto_1" id="foto_1" accept="image/*">
            <input type="file" name="foto_2" id="foto_2" accept="image/*">
            <input type="file" name="foto_3" id="foto_3" accept="image/*">
            <input type="file" name="foto_4" id="foto_4" accept="image/*">
            <input type="file" name="foto_5" id="foto_5" accept="image/*"> --}}

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
            <input type="text" name="descripcion" id="descripcion"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-9/12 h-28 pb-20 @error('descripcion') border-red-500 @enderror"
                value="{{ old('descripcion', $producto->descripcion) }}">
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
</x-app-layout>
