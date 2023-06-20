<?php

namespace App\Http\Controllers;

use App\Models\Carrello;
use App\Models\Prodotto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AssociazioneController extends Controller
{
    public function associaProdottiCarrello(Request $request): View
    {
        return \view('associazione.prodotti-carrelli', [
            'carrelli' => Carrello::all(),
            'prodotti' => Prodotto::all()
        ]);
    }

    public function salvaAssociazioneProdottiCarrelli(Request $request): RedirectResponse
    {
        $valori = $request->validate([
            'carrello' => 'required',
            'prodotto' => 'required'
        ]);

        $messaggioSuccesso = "Associazione già presente";

        /** @var Carrello $carrello */
        $carrello = Carrello::find($valori['carrello']);

        $idProdotto = $valori['prodotto'];

        /** @var Prodotto|null $prodottoPresente */
        // $prodottoPresente = $carrello->prodotti()->where('prodotti.id', '=' ,$idProdotto)->first();

        // uguale ma con query
        // $prodottoPresente = Prodotto::leftJoin('prodotti_carrelli', 'prodotti.id', '=', 'id_prodotto')
            // ->where('id_carrello', '=', $carrello->id)
            // ->where('id_prodotto', '=', $idProdotto)
            // ->first();

        // Uguale ma con query carrello
        $prodottoPresente = Carrello::leftJoin('prodotti_carrelli', 'carrelli.id', '=', 'id_carrello')
            ->where('id_carrello', '=', $carrello->id)
            ->where('id_prodotto', '=', $idProdotto)
            ->first();

        if(null  === $prodottoPresente){
            $carrello->prodotti()->attach($valori['prodotto']);

            $carrello->save();
            $messaggioSuccesso = "Associazione fatta";
        }


        return redirect()
            ->route('associa-prodotti-carrello')
            ->with('messaggio-successo', $messaggioSuccesso);
    }
}
