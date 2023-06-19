<?php

namespace App\Observers;

use App\Models\Prodotto;

class ProdottoObserver
{
    /**
     * Handle the Prodotto "created" event.
     */
    public function creating(Prodotto $prodotto): void
    {
        $this->nomeMaiuscolo($prodotto);
    }

    /**
     * Handle the Prodotto "updated" event.
     */
    public function updating(Prodotto $prodotto): void
    {
        $this->nomeMaiuscolo($prodotto);
    }

    private function nomeMaiuscolo(Prodotto $prodotto): void
    {
        $prodotto->nome = strtoupper($prodotto->nome);
    }
}
