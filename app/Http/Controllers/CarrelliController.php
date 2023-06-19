<?php

namespace App\Http\Controllers;

use App\Models\Carrello;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class CarrelliController extends Controller
{
    public function list(): View
    {
        $carrelli = Carrello::all();

        // return view('carrelli.list', ['carrelli' => $carrelli]);
        // È la stessa cosa di
        return view('carrelli.list', compact('carrelli'));
    }

    public function newCarrello(): View
    {
        return view('carrelli.crea');
    }

    public function salva(Request $request): RedirectResponse
    {
        $request->validate([
            'nome' => ['required', 'min:3'],
        ]);

        $carrello = new Carrello();
        $carrello->nome = $request->nome;
        $carrello->save();

        return redirect()->route('form-carrello')->with('carrello-creato', 'Carrello creato');
    }

    public function get(Carrello $carrello): Carrello
    {
        return $carrello;
    }
}
