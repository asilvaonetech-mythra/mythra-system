<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('talent_applications', function (Blueprint $table) {

            $table->id();

            $table->foreignId('talent_profile_id')
                ->constrained('talent_profiles')
                ->cascadeOnDelete();

            $table->foreignId('opportunity_id')
                ->constrained('opportunities')
                ->cascadeOnDelete();

            $table->foreignId('selection_process_id')
                ->nullable()
                ->constrained('selection_processes')
                ->nullOnDelete();

            $table->enum('status', [
                'enviado',
                'em_analise',
                'aprovado',
                'reprovado',
                'cancelado'
            ])
            ->default('enviado');

            $table->text('observacao')
                ->nullable();

            $table->timestamps();

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('talent_applications');
    }
};