<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white">
            @livewire('chat', ['receptorId'=> $receptorId, 'productoId'=>$productoId, 'conver' =>$conver])
        </div>
    </div>
</x-app-layout>
