@extends('layout.layout')

@section('content')
@foreach($prodotti as $prodotto)
    <p>Prodotto {{$prodotto->nome}} costa {{$prodotto->prezzo}} </p>
@endforeach
@endsection
