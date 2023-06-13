<x-app-layout>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white">

                @livewire('user', ['perfil'=>$perfil])

            </div>

           {{--  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex">
                <li class="flex ">
                    <ul>
                        <div class="p-6 bg-white border-b border-gray-200 hover:bg-gray-100">
                            <button wire:click="$set('componenteActual', 'venta')" wire:model="componenteActual" >Productos en venta</button>
                        </div>
                    </ul>
                    <ul>
                        <div class="p-6 bg-white border-b border-gray-200 hover:bg-gray-100">
                            <button wire:click="$set('componenteActual', 'vendidos')" wire:model="componenteActual" >Productos vendidos</button>
                        </div>
                    </ul>
                </li>
            </div> --}}

            <div class="bg-white">
                {{-- Esto deberia cambiar dependiendo de la eleccion superior --}}
                {{-- <x-productos.en_venta :productos="$productos" /> --}}

                {{-- @livewire('venta', ['productos'=>$productos]) --}}


               {{--  {{$componenteActual}}
                @livewire( "$componenteActual", ['productos'=>$productos]) --}}

                {{-- <div class="p-6 bg-white border-b border-gray-200 hover:bg-gray-100">
                    <button wire:click="$set('componenteActual', 'venta')" wire:model="componenteActual" >Productos en venta</button>
                    <button wire:click="$set('componenteActual', 'vendidos')" wire:model="componenteActual" >Productos vendidos</button>

                    Debo investigar si va dentro o no de un mismo div para que funcione. Limpia esta basura arfavó

                </div> --}}
                {{-- @if ($componenteActual === 'venta')
                    @livewire('venta', ['productos'=>$productos])
                @elseif ($componenteActual === 'vendidos')
                    @livewire('vendidos', ['productos'=>$productos])
                @endif --}}


            </div>
        </div>
    </div>
</x-app-layout>
