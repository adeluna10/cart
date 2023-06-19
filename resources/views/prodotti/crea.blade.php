<html>
<body>

@if(\Illuminate\Support\Facades\Session::has('success'))
    <p style="color: green"> {{\Illuminate\Support\Facades\Session::get('success')}} </p>
@endif

    <form method="post">
        @csrf
        <select id="carrello" name="carrello">
            <option value="0">...</option>
            @foreach($carrelli as $carrello)
                <option value="{{$carrello->id}}"> {{$carrello->nome}} </option>
            @endforeach
        </select>
        <div>
            <label for="nome">Nome</label>
            <input id="nome" name="nome" type="text"
                   @if (false === $errors->has('nome'))
                       value="{{ old('nome') }}"
                   @endif
            >
            @error('nome')
            <p style="color: red"> {{$message}}</p>
            @enderror
        </div>

        <div>
            <label for="prezzo">Prezzo</label>
            <input id="prezzo" name="prezzo" type="text"
                   @if (false === $errors->has('prezzo'))
                       value="{{ old('prezzo') }}"
                   @endif
            >
            @error('prezzo')
            <p style="color: red"> {{$message}}</p>
            @enderror
        </div>

        <button type="submit">Invia</button>
    </form>
</body>
</html>
