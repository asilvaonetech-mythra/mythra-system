<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('opportunity_skills', function (Blueprint $table) {

            $table->id();

            $table->foreignId('opportunity_id')
                ->constrained('opportunities')
                ->cascadeOnDelete();

            $table->foreignId('skill_id')
                ->constrained('skills')
                ->cascadeOnDelete();

            $table->enum('nivel_desejado', [
                'basico',
                'intermediario',
                'avancado',
                'especialista'
            ])
            ->default('basico');

            $table->timestamps();

            $table->unique([
                'opportunity_id',
                'skill_id'
            ]);

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('opportunity_skills');
    }
};