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
        Schema::create('transactions', function (Blueprint $table) {
            $table->ulid('id');
            $table->string('ref_number',10)->unique();
            $table->string('source_card',16);
            $table->string('destination_card',16);
            $table->unsignedBigInteger('amount')->comment('IRR');
            $table->timestamps();

            $table->index('source_card');
            $table->index('destination_card');
            $table->index(['source_card','created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
