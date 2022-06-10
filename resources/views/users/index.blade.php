<x-app-layout>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white">

                @livewire('perfil', ['perfil'=>$perfil])


            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex">
                <li class="flex ">
                    <ul>
                        <div wire:click="" class="p-6 bg-white border-b border-gray-200 hover:bg-gray-100">
                            Productos en venta
                        </div>
                    </ul>
                    <ul>
                        <div class="p-6 bg-white border-b border-gray-200 hover:bg-gray-100">
                            Productos vendidos
                        </div>
                    </ul>
                </li>
            </div>

            <div class="bg-white">
                {{-- Esto deberia cambiar dependiendo de la eleccion superior --}}
                {{-- <x-productos.en_venta :productos="$productos" /> --}}

                @livewire('en-venta', ['productos'=>$productos])


            </div>
        </div>
    </div>
</x-app-layout>
