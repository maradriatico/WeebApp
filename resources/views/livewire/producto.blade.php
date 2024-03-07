<div class="mx-auto sm:px-6 lg:px-8 min-h-screen pb-10">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        {{-- BUSQUEDA Y FILTRADO DEL PRODUCTO --}}
        <div class="flex p-4 justify-center sm:justify-evenly bg-orange-100">
            <form wire:submit.prevent="actualizarBusqueda" class="flex flex-col md:flex-row gap-3">
                <div class="flex">
                    <input type="text" wire:model="search" placeholder="Nombre del producto"
                    class="w-full md:w-80 px-3 h-10 rounded-l border-2 border-gray-500">
                    <button type="submit" class="bg-green-400 text-black rounded-r px-2 md:px-3 py-0 md:py-1">Buscar</button>
                </div>
                <select type="text" wire:model="categoria"
                    class="w-full h-10 border-2 border-gray-500 focus:outline-none focus:border-gray-500 text-gray-500 rounded px-2 md:px-3 py-0 md:py-1 tracking-wider">
                    <option selected>Categoria</option>
                    @foreach ($lcategorias as $categori)
                        <option value="{{$categori->id}}">{{$categori->denominacion}}</option>
                    @endforeach
                </select>
                <select type="text" wire:model="estado"
                    class="w-full h-10 border-2 border-gray-500 focus:outline-none focus:border-gray-500 text-gray-500 rounded px-2 md:px-3 py-0 md:py-1 tracking-wider">
                    <option selected>Estado</option>
                    @foreach ($lestados as $estatus)
                        <option value="{{$estatus->id}}">{{$estatus->tipo}}</option>
                    @endforeach
                </select>


                <button wire:click="limpiar" class="bg-gray-400 text-black rounded px-2 md:px-3 py-0 md:py-1">Limpiar</button>
            </form>
        </div>

        <br>

        {{-- RESULTADO DE LA BÚSQUEDA --}}

       <div class="flex flex-wrap gap-4 p-4">

        @if ($productos->count() == 0)
            <div class="text-center justify-center">
                <p>Lo siento.. No encontramos lo que buscas</p>
            </div>
        @endif

        @foreach($productos as $producto)
        <div class="bg-orange-200 p-4 rounded-lg w-80 shadow-md flex flex-col">
            <div class="w-full h-52 overflow-hidden">
                <a href="/productos/{{$producto->id}}">
                    <img src="{{ $producto->fotos->foto_1 }}" alt="{{ $producto->nombre }}" class="w-full h-full object-cover transition-transform duration-300 transform hover:scale-110">
                </a>
            </div>
            <div class="mt-4 flex justify-between items-center">
                <h2 class="text-lg font-semibold overflow-hidden" style="text-overflow: ellipsis; white-space: nowrap;">{{ $producto->nombre }}</h2>

                {{-- Comprobamos si es o no favorito, para cambiar el relleno y la función del corazon --}}
                @if ($producto->user_id != Auth::id())
                  @if ($producto->esFavorito())

                    <a href={{"/favoritos/$producto->id/destroy"}}>
                        <svg class="w-7 h-7 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="m12.7 20.7 6.2-7.1c2.7-3 2.6-6.5.8-8.7A5 5 0 0 0 16 3c-1.3 0-2.7.4-4 1.4A6.3 6.3 0 0 0 8 3a5 5 0 0 0-3.7 1.9c-1.8 2.2-2 5.8.8 8.7l6.2 7a1 1 0 0 0 1.4 0Z"/>
                        </svg>
                    </a>

                     @else

                    <a href={{"/favoritos/$producto->id/create"}}>
                        <svg class="w-7 h-7 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z"/>
                        </svg>
                    </a>

                  @endif
                @endif
            </div>
            <p class="text-gray-800 font-bold text-lg">{{ $producto->precio }} €</p>
            <p class="text-gray-600 mt-2 text-sm overflow-hidden" style="text-overflow: ellipsis; white-space: nowrap;">{{ $producto->descripcion }}</p>
        </div>
        @endforeach
        </div>

    </div>
</div>


