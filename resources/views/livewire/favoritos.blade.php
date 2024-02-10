{{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white h-full pb-10">
    @if (isset($productos[0]))
    <div class="row flex flex-wrap">
        @foreach ($productos as $prod)
        <div class="col-xs-4 col-lg-4 m-2 bg-orange-200">
            <a href="{{route('productos.show', $prod->producto->id)}}">
            <div class="thumbnail p-3 ">
                <img class="h-52 " src="{{asset('image.png')}}"  alt="No hay na" />
                <div class="text-left mt-1">
                    <b>{{ $prod->producto->nombre }}</b>
                </div>
                <div class="flex justify-between">
                    <p class="mt-1">{{ $prod->producto->precio }} €</p>
                    <b class="mt-1 mr-1 text-gray-600">{{ $prod->producto->user->name }}</b>
                </div>

            </div>
            </a>
            <a href="/favoritos/{{$prod->producto_id}}/destroy">
            <div class="p-2 m-2 border border-5 text-center col-xs-4 col-lg-4 bg-gray-400">
                Eliminar de favoritos
            </div>
            </a>
        </div>
        @endforeach
    @else
        <div>No tienes productos favoritos ¡Añade alguno a la lista!</div>
    @endif

</div> --}}
<div class="mx-auto sm:px-6 lg:px-8 min-h-screen pb-10">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
     @if ($productos->count() != 0)
        <div class="flex flex-wrap gap-4 p-4">
         @foreach($productos as $prod)
            <div class="bg-orange-200 p-4 rounded-lg w-80 shadow-md flex flex-col">
                <div class="w-full h-52 overflow-hidden">
                    <a href="/productos/{{$prod->producto_id}}">
                        <img src="{{ $prod->producto->fotos->foto_1 }}" alt="{{ $prod->producto->nombre }}" class="w-full h-full object-cover transition-transform duration-300 transform hover:scale-110">
                    </a>
                </div>
                <div class="mt-4 flex justify-between items-center">
                    <h2 class="text-lg font-semibold overflow-hidden" style="text-overflow: ellipsis; white-space: nowrap;">{{ $prod->producto->nombre }}</h2>
                </div>
                <p class="text-gray-800 font-bold text-lg">{{ $prod->producto->precio }} €</p>

                <a class="pt-3" href="/favoritos/{{$prod->producto_id}}/destroy">
                    <div class="p-2 m-2 border border-5 text-center col-xs-4 col-lg-4 bg-gray-400">
                        Eliminar de favoritos
                    </div>
                </a>
            </div>

         @endforeach
        </div>

        @else
        <div>No tienes productos favoritos ¡Añade alguno a la lista!</div>
    @endif
    </div>
</div>

