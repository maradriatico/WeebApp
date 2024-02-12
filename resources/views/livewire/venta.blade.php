<div class="flex flex-wrap gap-4 p-4">

    @if ($productos->count() == 0)
        <div class="text-center justify-center">
            <p>No has subido ningún producto aún. ¡Vende lo que no necesites!</p>
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
        @if ($producto->user_id != Auth::id())

            <p class="text-gray-600 mt-2 text-sm overflow-hidden" style="text-overflow: ellipsis; white-space: nowrap;">{{ $producto->descripcion }}</p>

        @else
            <br>
            <div class="p-2 flex justify-around border border-t-2 bg-orange-100">
                <a href="/productos/{{$producto->id}}/marcar" class="flex flex-col items-center">
                    <svg class="h-8 w-8 text-gray-800"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <polyline points="9 11 12 14 20 6" />  <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg> ¡Vendido!</a>
                <form action="{{route('productos.destroy', [$producto])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Deseas borrar tu producto?')" class="flex flex-col items-center">
                        <svg class="w-8 h-8 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                        </svg>
                        Borrar
                    </button>
                </form>
                <a href="/productos/{{$producto->id}}/edit" class="flex flex-col items-center">
                    <svg class="w-8 h-8 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.3 4.8 2.9 2.9M7 7H4a1 1 0 0 0-1 1v10c0 .6.4 1 1 1h11c.6 0 1-.4 1-1v-4.5m2.4-10a2 2 0 0 1 0 3l-6.8 6.8L8 14l.7-3.6 6.9-6.8a2 2 0 0 1 2.8 0Z"/>
                  </svg> Editar</a>
            </div>
        @endif
    </div>
    @endforeach
</div>

