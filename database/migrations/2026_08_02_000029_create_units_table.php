<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('units', function (Blueprint $table) {

            $table->id();

            $table->foreignId('organization_id')
                ->constrained('organizations')
                ->cascadeOnDelete();

            $table->string('nome');

            $table->string('codigo')
                ->nullable();

            $table->string('tipo')
                ->nullable();

            $table->text('descricao')
                ->nullable();

            $table->string('localizacao')
                ->nullable();

            $table->enum('status', [
                'ativa',
                'inativa',
                'analise'
            ])
            ->default('analise');

            $table->timestamps();

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};