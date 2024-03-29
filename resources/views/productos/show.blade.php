<x-app-layout>

    <div class="mx-auto sm:px-6 lg:px-8 min-h-screen pb-10 ">

    <div class="flex justify-center ">
        @if (!$producto->fotos->foto_2)
        <img src="{{ asset( $producto->fotos->foto_1) }}" class="w-56">

        @else

        <div id="default-carousel" class="relative w-96" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                 <!-- Imagen 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset( $producto->fotos->foto_1) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                </div>
                <!-- Imagen 2 -->
                @if ($producto->fotos->foto_2)
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset( $producto->fotos->foto_2) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    </div>
                @endif
                <!-- Imagen 3 -->
                @if ($producto->fotos->foto_3)
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset( $producto->fotos->foto_3) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    </div>
                @endif
                <!-- Imagen 4 -->
                @if ($producto->fotos->foto_4)
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset( $producto->fotos->foto_4) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    </div>
                @endif
                <!-- Imagen 5 -->
                @if ($producto->fotos->foto_5)
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset( $producto->fotos->foto_5) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    </div>
                @endif
            </div>

            <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    <span class="sr-only">Anterior</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    <span class="sr-only">Siguiente</span>
                </span>
            </button>

        </div>

        @endif

    </div>
    <br>

    <div class="h-100 pb-20 flex justify-center bg-white">
        <div>
            <br>
            <div class="grid grid-cols-2 gap-x-52 gap-y-4 place-content-between">
                <a href={{"/user/$producto->user_id"}}>
                    <div class="flex">
                        <img class="w-10" src="{{ asset('foto-perfil.jpg')}}" alt="">
                        <div class="ml-2 text-3xl">{{$producto->user->name}}</div>
                    </div>
                </a>
                <div class="flex">
                    @if ($producto->user_id == Auth::id())
                        <a href="/productos/{{$producto->id}}/edit" class="px-3 py-2 rounded-md text-sm bg-green-400 leading-5 font-medium text-gray-800 font-semibold hover:bg-green-500 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 "> Editar </a>
                    @else
                        <a href="/chat/{{$producto->id}}" class="px-3 py-2 rounded-md text-sm bg-orange-400 leading-5 font-medium text-gray-800 font-semibold hover:bg-orange-500 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 "> Chats </a>
                    @endif

                    <div class="font-semibold text-4xl pl-3 pt-1">
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


                    </div>
                </div>
                <div class="font-semibold text-3xl right">{{$producto->nombre}}</div>
                <div class="font-semibold text-2xl">{{$producto->precio}}€</div>

            </div>
            <div class="font-semibold">Categoría: {{$producto->categoria->denominacion}} - Estado: {{$producto->estado->tipo}}</div>
            <div class="font-semibold border-b-2 border-orange-700">Descripción del producto:</div>
            <div class="font-semibold border-solid">{{$producto->descripcion}}</div>
        </div>
    </div>
    </div>

</x-app-layout>
