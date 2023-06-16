<?php

declare(strict_types=1);


namespace Tests\Unit;

use App\Factory\ProdottoFactory;
use App\Models\Prodotto;
use App\Service\Prodotto\CreaProdotto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery\MockInterface;
use Tests\TestCase;

class CreaProdottoTest extends TestCase
{
    protected CreaProdotto $creaProdotto;

    /** @test */
    public function dovrebbe_salvare_un_prodotto(): void
    {
        $prodotto = \Mockery::mock(Prodotto::class, function(MockInterface $mock) {
            $mock->shouldReceive('save')->once();
        });

        $prodottoFactoryMock = \Mockery::mock(ProdottoFactory::class, function (MockInterface $mock) use ($prodotto) {
            $mock->shouldReceive('execute')->once()->andReturn($prodotto);
        });

        $creaProdotto = new CreaProdotto($prodottoFactoryMock);

        $nome = 'nome-prodotto';
        $prezzo = 50;

        $creaProdotto->execute(
            $nome,
            $prezzo
        );
    }
}
