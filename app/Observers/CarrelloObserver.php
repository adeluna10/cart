<?php

namespace App\Observers;

use App\Models\Carrello;
use App\Service\CreaLog;
use App\Service\OperazioneLog;

class CarrelloObserver
{
    public function __construct(
        private CreaLog $creaLog
    ) {
    }

    public function created(Carrello $carrello): void
    {
        $this->creaLog->execute(
            $carrello,
            OperazioneLog::Crea
        );
    }


    public function updated(Carrello $carrello): void
    {
        $this->creaLog->execute(
            $carrello,
            OperazioneLog::Aggiorna
        );
    }
}
