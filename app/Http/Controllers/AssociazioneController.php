<?php

namespace App\Http\Controllers;

use App\Models\Carrello;
use App\Models\Prodotto;
use App\Service\Associazione\AssociaProdottoCarrello;
use App\Service\Associazione\RimuoviAssociazioneProdottoCarrello;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AssociazioneController extends Controller
{
    public function associaProdottiCarrello(Request $request): View
    {
        return view('associazione.prodotti-carrelli', [
            'carrelli' => Carrello::all(),
            'prodotti' => Prodotto::all()
        ]);
    }

    public function salvaAssociazioneProdottiCarrelli(Request $request, AssociaProdottoCarrello $associaProdottoCarrello): RedirectResponse
    {
        $valori = $request->validate([
            'carrello' => 'required',
            'prodotto' => 'required'
        ]);

        $messaggio = 'Associazione eseguita';

        try {
            $associaProdottoCarrello->execute(
                $valori['carrello'],
                $valori['prodotto']
            );
        } catch (\Throwable $e) {
            $messaggio = 'Si è verificato un errore';
        }

        return redirect()
            ->route('associa-prodotti-carrello')
            ->with('messaggio', $messaggio);
    }

    public function togliProdotto(
        Request $request,
        RimuoviAssociazioneProdottoCarrello $rimuoviAssociazioneProdottoCarrello
    ): RedirectResponse {
        $request->validate([
            'carrello' => ['required'],
            'prodotto' => ['required'],
        ]);

        $rimuoviAssociazioneProdottoCarrello->execute(
            $request->carrello,
            $request->prodotto
        );

        return redirect()->route('carrelli');
    }
}
