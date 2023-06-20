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

    /**
     * Handle the Carrello "deleted" event.
     */
    public function deleted(Carrello $carrello): void
    {
        //
    }

    /**
     * Handle the Carrello "restored" event.
     */
    public function restored(Carrello $carrello): void
    {
        //
    }

    /**
     * Handle the Carrello "force deleted" event.
     */
    public function forceDeleted(Carrello $carrello): void
    {
        //
    }
}
