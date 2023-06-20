<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Carrello extends Model
{
    use HasFactory;

    protected $table = 'carrelli';
    protected $visible = ['nome'];

    public function prodotti(): BelongsToMany
    {
        return $this->belongsToMany(
            Prodotto::class,
            'prodotti_carrelli',
            'id_carrello',
            'id_prodotto'
        );
    }
}
