<html>
<body>
@if(\Illuminate\Support\Facades\Session::has('carrello-creato'))
    <p style="color: green"> {{\Illuminate\Support\Facades\Session::get('carrello-creato')}} </p>
@endif

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
