<?php

namespace App\Http\Controllers;

use App\Models\Carrello;
use App\Models\Prodotto;
use App\Service\Prodotto\CreaProdotto;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProdottiController extends Controller
{
    public function list(): View
    {
        $prodotti = Prodotto::all();

        return view('prodotti.list', [
            'prodotti' => $prodotti
        ]);
    }

    public function get(Prodotto $prodotto): Prodotto
    {
        return $prodotto;
    }

    public function crea(): View
    {
        return view('prodotti.crea', [
            'carrelli' => Carrello::all()
        ]);
    }

    public function salva(Request $request, CreaProdotto $creaProdotto): RedirectResponse
    {
        $request->validate([
            'nome' => ['required'],
            'prezzo' => ['required', 'numeric', 'min:1']
        ]);

        $prodotto = $creaProdotto->execute(
            $request->nome,
            $request->prezzo
        );

        if($idCarrello = $request->carrello) {
            $carrello = Carrello::find($idCarrello);

            $prodotto->carrello()
                ->attach($carrello);
            $prodotto->save();
        }

        return redirect()->route('form-prodotto')->with('success', 'Prodotto creato');
    }
}
