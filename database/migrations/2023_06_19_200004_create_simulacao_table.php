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
        Schema::create('simulacao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('tipo');
            $table->string('titulo');
            $table->decimal('valor', 10, 2);
            $table->decimal('taxa', 5, 2);
            $table->string('banco')->nullable();
            $table->float('tempo');
            $table->float('parcela', 10, 2);
            $table->date('data_criacao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simulacao');
    }
};