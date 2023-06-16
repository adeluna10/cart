<?php

namespace App\Service\Prodotto;

use App\Factory\ProdottoFactory;
use App\Models\Prodotto;

class CreaProdotto
{

    public function __construct(
        private ProdottoFactory $prodottoFactory
    ) {

    }

    public function execute(string $nome, int $prezzo): Prodotto
    {
        $prodotto = $this->prodottoFactory->execute($nome, $prezzo);

        $prodotto->save();

        return $prodotto;
    }
}
