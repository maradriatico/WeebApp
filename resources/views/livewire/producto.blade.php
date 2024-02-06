<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 min-h-screen pb-10">

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

        <div class="row flex flex-wrap">

            @if ($productos->count() == 0)
                 <div class="text-center">
                     <p>Lo siento.. No encontramos lo que buscas</p>
                 </div>
            @endif

           @foreach ($productos as $prod)
                   <div class="bg-orange-200 item col-xs-4 col-lg-4 m-2">
                       <div class="thumbnail p-3">
                           <a href="{{route('productos.show', $prod->id)}}">
                           <img class="h-20 " src="{{ asset( $prod->fotos->foto_1) }}" {{-- src="{{ $prod->image }}" --}} alt="No hay imagen disponible" /> </a>
                           <div class="flex justify-between">
                               <b class="mt-1">{{ $prod->precio }} €</b>
                               <div class="mr-1 mt-1">
                                   @if ($prod->esFavorito())

                                   <a href={{"/favoritos/$prod->id/destroy"}}>
                                       <svg class="w-7 h-7 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                           <path d="m12.7 20.7 6.2-7.1c2.7-3 2.6-6.5.8-8.7A5 5 0 0 0 16 3c-1.3 0-2.7.4-4 1.4A6.3 6.3 0 0 0 8 3a5 5 0 0 0-3.7 1.9c-1.8 2.2-2 5.8.8 8.7l6.2 7a1 1 0 0 0 1.4 0Z"/>
                                       </svg>
                                   </a>

                               @else

                                   <a href={{"/favoritos/$prod->id/create"}}>
                                       <svg class="w-7 h-7 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z"/>
                                       </svg>
                                   </a>

                               @endif
                               </div>
                           </div>

                           <div class="text-left">
                               <p>{{ $prod->nombre }}</p>
                           </div>

                       </div>
                   </div>

           @endforeach
       </div>

    </div>
</div>
