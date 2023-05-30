<x-app-layout>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex">


            </div> --}}

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex">

                @if ($productos->count() == 0)
                    <div class="text-center">
                        <p>Lo siento.. No encontramos lo que buscas</p>
                    </div>
                @endif
                {{-- @livewire('buscados', ['productos'=>$productos]) --}}

                <div class="row flex flex-wrap">
                    @foreach ($productos as $prod)
                        <a href="{{route('productos.show', $prod->id)}}">
                            <div class="bg-orange-200 item col-xs-4 col-lg-4 m-2">
                                <div class="thumbnail p-2">
                                    <img src="image.png" {{-- src="{{ $prod->image }}" --}} alt="No hay na" />
                                    <div class="flex justify-between">
                                        <b class="mt-1">{{ $prod->precio }} €</b>
                                        <div class="mr-1">
                                            <svg class="h-8 w-8 text-red-500"   fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                              </svg>
                                        </div>
                                    </div>

                                    <div class="text-left">
                                        <p>{{ $prod->nombre }}</p>
                                    </div>

                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
