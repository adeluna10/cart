@if(\Illuminate\Support\Facades\Session::has($nomeMessaggio))
    <p> {{\Illuminate\Support\Facades\Session::get($nomeMessaggio)}} </p>
@endif
