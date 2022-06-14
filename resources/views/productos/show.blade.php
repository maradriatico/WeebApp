<x-app-layout>
<!-- This is an example component -->
<div class="flex justify-center ">
    <div class="carousel ">
        <div class="carousel-inner">
            <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
            <div class="carousel-item">
                <img src="http://fakeimg.pl/500x400/0079D8/fff/?text=Imagen1">
            </div>
            <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item">
                <img src="http://fakeimg.pl/500x400/DA5930/fff/?text=Imagen2">
            </div>
            <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item">
                <img src="http://fakeimg.pl/500x400/F90/fff/?text=Imagen3">
            </div>
            <label for="carousel-3" class="carousel-control prev control-1">‹</label>
            <label for="carousel-2" class="carousel-control next control-1">›</label>
            <label for="carousel-1" class="carousel-control prev control-2">‹</label>
            <label for="carousel-3" class="carousel-control next control-2">›</label>
            <label for="carousel-2" class="carousel-control prev control-3">‹</label>
            <label for="carousel-1" class="carousel-control next control-3">›</label>
        </div>
    </div>

</div>

<div class="h-100 pb-20 flex justify-center">
    <div>
        <div class="grid grid-cols-2 gap-x-52 gap-y-4 place-content-between">
            <a href="{{route('user.show', $producto->user_id)}}">
                <div class="flex">
                    <img class="w-10" src="{{ asset('foto-perfil.jpg')}}" alt="">
                    <div class="ml-2 text-3xl">{{$producto->user->name}}</div>
                </div>
            </a>
            <div class="flex">
                <a href="#" class="px-3 py-2 rounded-md text-sm bg-orange-500 leading-5 font-medium text-gray-800 font-semibold hover:bg-orange-500 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 "> Chats </a>

                <div class="font-semibold text-4xl"><a href={{'/favoritos/create/' . $producto->id}}><svg class="h-8 w-8 text-red-500"   fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                  </svg></a></div>
            </div>
            <div class="font-semibold text-3xl right">{{$producto->nombre}}</div>
            <div class="font-semibold text-2xl">{{$producto->precio}}€</div>

        </div>
        <div class="font-semibold">Categoría: {{$producto->categoria->denominacion}} - Estado: {{$producto->estado->tipo}}</div>
        <div class="font-semibold border-b-2 border-orange-700">Descripción del producto:</div>
        <div class="font-semibold border-solid">{{$producto->descripcion}}</div>
    </div>
</div>

</x-app-layout>
