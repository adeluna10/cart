<?php

namespace App\Service\Associazione;

use App\Models\Carrello;
use App\Models\Prodotto;
use Webmozart\Assert\Assert;
use Webmozart\Assert\InvalidArgumentException;

class AssociaProdottoCarrello
{
    /**
     * @throws InvalidArgumentException
     */
    public function execute(int $idCarrello, int $idProdotto): void
    {
        Assert::positiveInteger($idCarrello);
        Assert::positiveInteger($idProdotto);

        $carrello = Carrello::find($idCarrello);

        /** @var Prodotto|null $prodottoPresente */
        $prodottoPresente = $carrello->prodotti()->where('prodotti.id', '=', $idProdotto)->first();

        if (null === $prodottoPresente) {
            $carrello->prodotti()->attach($idProdotto);
            $carrello->save();
        }
    }
}
