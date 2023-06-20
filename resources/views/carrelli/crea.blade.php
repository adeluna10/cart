@extends('layout.layout')

<html>
<body>

@include('layout.messaggio-successo', ['nomeMessaggioSuccesso' => 'success'])

<form method="post">
    @csrf

    @error('nome')
        <p style="color: red" >{{$message}}</p>
    @enderror
    <div>
        <label for="nome">Nome</label>
        <input id="nome" name="nome" type="text">
    </div>

    <button type="submit">Invia</button>


</form>
</body>
</html>
