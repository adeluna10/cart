@extends('layout.layout')

@section('content')
    @include('layout.messaggio', ['nomeMessaggio' => 'messaggio'])
    <form method="post">
        <div>
            @include('layout.errore-form', ['nomeCampo' => 'carrello'])
        </div>
        @csrf
        <div>
            <label for="carrello">Carrello</label>
            <select name="carrello" id="carrello">
                <option value="">...</option>
                @foreach($carrelli as $carrello)
                    <option value="{{$carrello->id}}">{{$carrello->nome}}</option>
                @endforeach
            </select>
        </div>

        <div>
            @include('layout.errore-form', ['nomeCampo' => 'prodotto'])
            <label for="prodotto">Prodotto</label>
            <select name="prodotto" id="prodotto">
                <option value="">...</option>
                @foreach($prodotti as $prodotto)
                    <option value="{{$prodotto->id}}">{{$prodotto->nome}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Invia</button>
    </form>

@endsection
