@extends('layout.layout')

@section('content')
    <div>
        @foreach ($carrelli as $carrello)
            {{ $carrello->nome }}
            prodotti:
            @foreach ($carrello->prodotti as $prodotto)
                {{ $prodotto->id }} {{ $prodotto->nome }}
                <form method="post" action="{{ route('elimina-associazione-carrello')}}">
                    @method('DELETE')
                    @csrf
                    <input type="hidden" name="carrello" value="{{$carrello->id}}" />
                    <input type="hidden" name="prodotto" value="{{$prodotto->id}}" />

                    <button>Cancella</button>
                </form>
            @endforeach
            <hr>
        @endforeach
    </div>
@endsection

