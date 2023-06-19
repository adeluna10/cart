<?php

namespace App\Http\Controllers;

use App\Models\Prodotto;
use App\Service\Prodotto\CreaProdotto;
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

    public function salva(Request $request, CreaProdotto $creaProdotto): RedirectResponse
    {
        $request->validate([
            'nome' => ['required'],
            'prezzo' => ['required', 'numeric', 'min:1']
        ]);

        $creaProdotto->execute(
            $request->nome,
            $request->prezzo
        );

        return redirect()->route('form-prodotto')->with('success', 'Prodotto creato');
    }
}
