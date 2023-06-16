<?php

namespace Tests\Feature;

use App\Service\Prodotto\CreaProdotto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreaProdottoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function dovrebbe_salvare_in_database_un_prodotto(): void{
        $creaProdotto = app()->make(CreaProdotto::class);

        $prodotto = $creaProdotto->execute('nome', 25);

        self::assertModelExists($prodotto);
    }

    /** @test */
    public function dovrebbe_salvare_in_database_due_prodotti(): void{
        $creaProdotto = app()->make(CreaProdotto::class);

        $creaProdotto->execute('nome1', 50);
        $creaProdotto->execute('nome2', 80);

        self::assertDatabaseCount('prodotti', 2);
    }
}
