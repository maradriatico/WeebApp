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

            @if ($producto->id == Auth::id())

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
        <div class="p-2 flex justify-around border border-t-2">
            <a href="/productos/{{$producto->id}}/marcar"><svg class="h-8 w-8 text-red-600"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <polyline points="9 11 12 14 20 6" />  <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg></a>
            <form action="{{route('productos.destroy', [$producto])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('¿Deseas borrar tu producto?')">
                    <svg class="h-8 w-8 text-black"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="4" y1="7" x2="20" y2="7" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" />  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                </button>
            </form>
            <a href="/productos/{{$producto->id}}/edit"><svg class="h-8 w-8 text-red-600"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />  <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />  <line x1="16" y1="5" x2="19" y2="8" /></svg></a>
        </div>
    </div>
    @endforeach
</div>
