@extends('layout.layout')

@foreach($prodotti as $prodotto)
    <p>Prodotto {{$prodotto->nome}} costa {{$prodotto->prezzo}} </p>
@endforeach
