<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('talent_profiles', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('nome_completo');

            $table->date('data_nascimento')
                ->nullable();

            $table->string('telefone')
                ->nullable();

            $table->string('localizacao')
                ->nullable();

            $table->text('resumo_profissional')
                ->nullable();

            $table->text('objetivo_profissional')
                ->nullable();

            $table->string('disponibilidade')
                ->nullable();

            $table->enum('status', [
                'ativo',
                'inativo',
                'analise'
            ])
            ->default('analise');

            $table->timestamps();

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('talent_profiles');
    }
};