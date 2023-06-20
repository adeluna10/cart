@extends('layout.layout')
@section('content')
    @include('layout.messaggio', ['nomeMessaggio' => 'success'])

    <form method="post">
        @csrf
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

@endsection
