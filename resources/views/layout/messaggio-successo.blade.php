@if(\Illuminate\Support\Facades\Session::has($nomeMessaggioSuccesso))
    <p style="color: green"> {{\Illuminate\Support\Facades\Session::get($nomeMessaggioSuccesso)}} </p>
@endif
