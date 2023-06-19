<?php

namespace App\Factory;

use App\Models\Prodotto;
use Illuminate\Support\Str;
use Webmozart\Assert\Assert;

class ProdottoFactory
{
    public function execute(string $nome, int $prezzo): Prodotto
    {
        Assert::notEmpty($nome);
        Assert::greaterThan($prezzo, 0);

        $prodotto = new Prodotto();

        $prodotto->nome = $nome;
        $prodotto->prezzo = $prezzo;
        $prodotto->sku = Str::uuid()->toString();

        return $prodotto;
    }
}
