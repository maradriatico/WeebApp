<div class="row flex flex-row p-3">
    @foreach ($productos as $prod)
        <div class="bg-orange-200 item col-xs-4 col-lg-4 m-2">
            <div class="thumbnail p-3">
                <img class="group list-group-image h-52 " src="image.png" {{-- src="{{ $prod->image }}" --}} alt="No hay na" />
                <div>
                    <b>{{ $prod->precio }} €</b>
                    <div class="flex justify-between">
                        <div class="text-left">
                            <p>{{ $prod->nombre }}</p>
                        </div>
                        <div class="text-right mr-1">
                            <p>@</p>
                        </div>
                    </div>
                    <div class="py-2 text-gray-500">
                        <p>{{ $prod->descripcion }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
