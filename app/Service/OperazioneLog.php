<?php

namespace App\Service;

enum OperazioneLog: string
{
    case Crea = 'CREATE';
    case Aggiorna = 'UPDATE';
}
