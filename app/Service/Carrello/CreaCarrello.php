<?php

namespace App\Service\Carrello;

use App\Models\Carrello;

class CreaCarrello
{
    public function execute(string $nome): Carrello
    {
        $carrello = new Carrello();
        $carrello->nome = $nome;
        $carrello->save();

        return $carrello;
    }
}
