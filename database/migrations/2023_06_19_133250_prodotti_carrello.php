<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prodotti_carrelli', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_carrello')
                ->constrained(table: 'carrelli');
            $table->foreignId('id_prodotto')
                ->constrained(table: 'prodotti');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('prodotti_carrelli');
    }
};
