<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white h-full pb-10">
    @if (isset($productos[0]))
    <div class="row flex flex-wrap">
        @foreach ($productos as $prod)
        <div class="col-xs-4 col-lg-4 m-2 bg-orange-200">
            <a href="{{route('productos.show', $prod->producto->id)}}">
            <div class="thumbnail p-3 ">
                <img class="h-52 " src="{{asset('image.png')}}" {{-- src="{{ $prod->image }}" --}} alt="No hay na" />
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

</div>
