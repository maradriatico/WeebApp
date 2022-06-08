<div class="row flex flex-row p-3">
    @foreach ($productos as $prod)
        <div class="bg-red-100 item col-xs-4 col-lg-4 m-2">
            <div class="thumbnail p-3">
                <img class="group list-group-image h-52 " src="tatu.jpg" {{-- src="{{ $prod->image }}" --}} alt="No hay na" />
                <div class="caption">
                    <b>{{ $prod->nombre }}</b>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <p>{{ $prod->precio }}€</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-2 flex justify-around border border-t-2">
                <a href="">&#129309;</a>
                <a href="">&#128190;</a>
                <a href="/productos/{{$prod->id}}/edit">&#128221;</a>
            </div>
        </div>
    @endforeach
</div>

