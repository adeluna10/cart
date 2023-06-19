<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
