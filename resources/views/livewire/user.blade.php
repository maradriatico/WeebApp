<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white h-full pb-10">
    <div>
        <div class="flex p-8">
            <img class="w-20" src="{{asset('foto-perfil.jpg')}}" alt="foto de perfil">
            <h2 class="font-semibold m-2 text-2xl">{{$perfil->name}}</h2>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex">
            <li class="flex ">
                <ul>
                    <div class="p-6 bg-white border-gray-200 @if ($componente == 'venta') border-b-4 border-b-red-600
                    @endif hover:bg-gray-100">
                        <button wire:click="cambiarComponente('venta')" >Productos en venta</button>
                    </div>
                </ul>
                <ul>
                    <div class="p-6 bg-white @if ($componente == 'vendidos') border-b-4 border-b-red-600
                    @endif hover:bg-gray-100">
                        <button wire:click="cambiarComponente('vendidos')" >Productos vendidos</button>
                    </div>
                </ul>
            </li>
        </div>
        <div class="bg-white pb-10">
            @if($componente === 'venta')
                @livewire('venta')
            @elseif($componente === 'vendidos')
                @livewire('vendidos')
            @endif
        </div>
    </div>
</div>
