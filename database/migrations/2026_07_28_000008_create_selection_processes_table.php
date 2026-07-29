<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('selection_processes', function (Blueprint $table) {

            $table->id();

            $table->foreignId('opportunity_id')
                ->constrained('opportunities')
                ->cascadeOnDelete();

            $table->string('nome');

            $table->text('descricao')
                ->nullable();

            $table->enum('status', [
                'aberto',
                'em_andamento',
                'finalizado',
                'cancelado'
            ])
            ->default('aberto');

            $table->timestamps();

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('selection_processes');
    }
};