<div>
    <div class="flex p-8">
        <img class="w-20" src="{{asset('foto-perfil.jpg')}}" alt="foto de perfil">
        <h2 class="font-semibold m-2 text-2xl">{{$perfil->name}}</h2>
    </div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex">
        <li class="flex ">
            <ul>
                <div class="p-6 bg-white border-b border-gray-200 hover:bg-gray-100">
                    <button wire:click="cambiarComponente('venta')" >Productos en venta</button>
                </div>
            </ul>
            <ul>
                <div class="p-6 bg-white border-b border-gray-200 hover:bg-gray-100">
                    <button wire:click="cambiarComponente('vendidos')" >Productos vendidos</button>
                </div>
            </ul>
        </li>
    </div>

    <div class="bg-white">
        {{$componente}}
        @livewire('venta', ['productos'=>$productos])
        {{-- @if ($componenteActual === 'venta')
                    @livewire('venta', ['productos'=>$productos])
                @elseif ($componenteActual === 'vendidos')
                    @livewire('vendidos', ['productos'=>$productos])
                @endif --}}
    </div>
</div>

