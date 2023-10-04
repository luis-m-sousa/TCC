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
        Schema::create('taxa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_taxa_id');
            $table->foreignId('banco_id');
            $table->decimal('valor', 5, 2);
            $table->timestamps();

            $table->foreign('tipo_taxa_id')->references('id')->on('tipo_taxa');
            $table->foreign('banco_id')->references('id')->on('banco');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taxa');
    }
};
