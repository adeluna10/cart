<?php

namespace App\Service;

use App\Models\Log;
use Illuminate\Database\Eloquent\Model;

class CreaLog
{
    public function execute(Model $model, OperazioneLog $operazioneLog): void
    {
        $log = new Log();
        $log->classe = $model::class;

        /** @phpstan-ignore-next-line  */
        $log->idEntita = $model->id;
        $log->operazione = $operazioneLog->value;

        $log->save();
    }
}
