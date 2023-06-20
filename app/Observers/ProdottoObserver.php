<?php

namespace App\Observers;

use App\Models\Prodotto;
use App\Service\CreaLog;
use App\Service\OperazioneLog;

class ProdottoObserver
{
    public function __construct(
        private CreaLog $creaLog
    ) {
    }

    public function created(Prodotto $prodotto): void
    {
        $this->creaLog->execute(
            $prodotto,
            OperazioneLog::Crea
        );
    }

    public function updated(Prodotto $prodotto): void
    {
        $this->creaLog->execute(
            $prodotto,
            OperazioneLog::Aggiorna
        );
    }

    public function creating(Prodotto $prodotto): void
    {
        $this->nomeMaiuscolo($prodotto);
    }

    public function updating(Prodotto $prodotto): void
    {
        $this->nomeMaiuscolo($prodotto);
    }

    private function nomeMaiuscolo(Prodotto $prodotto): void
    {
        $prodotto->nome = strtoupper($prodotto->nome);
    }
}
