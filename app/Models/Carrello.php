<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrello extends Model
{
    use HasFactory;

    protected $table = 'carrelli';
    // protected $hidden = ['id', 'created_at', 'updated_at'];
    protected $visible = ['nome'];
}
