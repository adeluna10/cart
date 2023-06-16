<?php

namespace Tests\Unit;

use App\Factory\ProdottoFactory;
use App\Models\Prodotto;
use Tests\TestCase;
use Webmozart\Assert\InvalidArgumentException;

class ProdottoFactoryTest extends TestCase
{
    protected ProdottoFactory $prodottoFactory;

    protected function setUp(): void
    {
        parent::setUp();

        $this->prodottoFactory = new ProdottoFactory();
    }

    /** @test */
    public function dovrebbe_restituire_un_prodotto(): void
    {
        $nome = 'prodotto';
        $prezzo = 50;

        $prodotto = $this->prodottoFactory->execute(
            $nome,
            $prezzo
        );

        self::assertInstanceOf(Prodotto::class, $prodotto);
    }

    /** @test */
    public function dovrebbe_restituire_un_prodotto_valorizzato(): void
    {
        $nome = 'prodotto';
        $prezzo = 50;

        $prodotto = $this->prodottoFactory->execute(
            $nome,
            $prezzo
        );

        self::assertEquals(
            $nome,
            $prodotto->nome
        );

        self::assertEquals(
            $prezzo,
            $prodotto->prezzo
        );

        self::assertNotEmpty($prodotto->sku);
    }

    /** @test */
    public function dovrebbe_dare_errore_se_nome_vuoto(): void
    {
        self::expectException(InvalidArgumentException::class);
        $this->prodottoFactory->execute('', 50);
    }

    /** @test */
    public function dovrebbe_dare_errore_se_prezzo_negativo(): void
    {
        self::expectException(InvalidArgumentException::class);
        $this->prodottoFactory->execute('fsafas', 0);
    }
}
