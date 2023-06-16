<?php

namespace App\Http\Controllers;

use App\Models\Prodotto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProdottiController extends Controller
{
    public function list()
    {
        return Prodotto::all();
    }

    public function get(Prodotto $prodotto)
    {
        return $prodotto;
    }

    public function crea()
    {
        return view('prodotti.crea');
    }

    public function salva(Request $request)
    {
        $request->validate([
            'nome' => ['required'],
            'prezzo' => ['required', 'numeric', 'min:1']
        ]);

        $prodotto = new Prodotto();

        $prodotto->sku = Str::uuid();

        $prodotto->nome = $request->nome;
        $prodotto->prezzo = $request->prezzo;

        $prodotto->save();

        return redirect('/prodotto')->with('success', 'Prodotto creato');
    }
}
