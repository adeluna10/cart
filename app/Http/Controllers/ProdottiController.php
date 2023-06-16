<?php

namespace App\Http\Controllers;

use App\Models\Prodotto;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProdottiController extends Controller
{
    /** @return Collection<int, Prodotto> */
    public function list(): Collection
    {
        return Prodotto::all();
    }

    public function get(Prodotto $prodotto): Prodotto
    {
        return $prodotto;
    }

    public function crea(): View
    {
        return view('prodotti.crea');
    }

    public function salva(Request $request): RedirectResponse
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
