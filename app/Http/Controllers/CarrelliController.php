<?php

namespace App\Http\Controllers;

use App\Models\Carrello;
use App\Service\Carrello\CreaCarrello;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CarrelliController extends Controller
{
    public function list(): View
    {
        return view('carrelli.list', [
            'carrelli' => Carrello::all()
        ]);
    }

    public function newCarrello(): View
    {
        return view('carrelli.crea');
    }

    public function salva(Request $request, CreaCarrello $creaCarrello): RedirectResponse
    {
        $request->validate([
            'nome' => ['required', 'min:3'],
        ]);

        $creaCarrello->execute($request->nome);

        return redirect()->route('form-carrello')->with('message', 'Carrello creato');
    }

    public function get(Carrello $carrello): Carrello
    {
        return $carrello;
    }
}
