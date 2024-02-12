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
        </div>
        <p class="text-gray-800 font-bold text-lg">{{ $producto->precio }} €</p>

        <a class="pt-3" href="/productos/{{$producto->producto_id}}/destroy">
            <div class="p-2 m-2 border border-5 text-center col-xs-4 col-lg-4 bg-gray-400">
                Eliminar Producto
            </div>
        </a>
    </div>
    @endforeach
</div>
