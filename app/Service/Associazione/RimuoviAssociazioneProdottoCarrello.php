<?php

namespace App\Service\Associazione;

use App\Models\Carrello;
use App\Models\Prodotto;

class RimuoviAssociazioneProdottoCarrello
{
    public function execute(int $idCarrello, int $idProdotto): void
    {
        $carrello = Carrello::find($idCarrello);

        /** @var Prodotto|null $prodottoPresente */
        $prodottoPresente = $carrello->prodotti()->where('prodotti.id', '=', $idProdotto)->first();

        if (null !== $prodottoPresente) {
            $carrello->prodotti()->detach($idProdotto);
        }
    }
}
