<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string $nome
 */
class Prodotto extends Model
{
    use HasFactory;

    protected $table = 'prodotti';

    protected $hidden = ['created_at', 'updated_at'];

    protected function nome(): Attribute
    {
        return Attribute::make(
            // set: static fn(string $nome) => strtoupper($nome)
            get: static fn (string $nome) => 'CAMBIATO ' . $nome
        );
    }

    public function carrello(): BelongsToMany
    {
        return $this->belongsToMany(Carrello::class, 'prodotti_carrelli', 'id_prodotto', 'id_carrello');
    }
}
