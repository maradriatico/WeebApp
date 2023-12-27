<div class="row flex flex-wrap">
    @foreach ($productos as $prod)
    <a href="{{route('productos.show', $prod->id)}}">
        <div class="bg-orange-200 item col-xs-4 col-lg-4 m-2">
            <div class="thumbnail p-3">
                <img class="group list-group-image h-52 " src="{{$prod->fotos->foto_1}}" {{-- src="{{ $prod->image }}" --}} alt="No hay na" />
                <div class="caption">
                    <b>{{ $prod->nombre }}</b>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <p>{{ $prod->precio }}€</p>
                        </div>
                    </div>
                </div>
            </div>

            @if (Auth::user()->id == $prod->user_id)
                <div class="p-2 flex justify-around border border-t-2">
                    <a href="#"><svg class="h-8 w-8 text-red-600"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <polyline points="9 11 12 14 20 6" />  <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg></a>
                    <form action="{{route('productos.destroy', [$prod])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Deseas borrar tu producto?')">
                            <svg class="h-8 w-8 text-red-600"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="4" y1="7" x2="20" y2="7" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" />  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                        </button>
                    </form>
                    <a href="/productos/{{$prod->id}}/edit"><svg class="h-8 w-8 text-red-600"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />  <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />  <line x1="16" y1="5" x2="19" y2="8" /></svg></a>
                </div>

            @endif

        </div>
    </a>
    @endforeach

</div>
