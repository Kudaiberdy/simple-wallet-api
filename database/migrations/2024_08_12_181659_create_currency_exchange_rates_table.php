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
        Schema::create('currency_exchange_rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('base_currency_id')
                ->constrained('currencies');
            $table->integer('rate');
            $table->foreignId('target_currency_id')
                ->constrained('currencies');
            $table->unique(['base_currency_id', 'target_currency_id'], 'currency_pair');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currency_exchange_rates');
    }
};
