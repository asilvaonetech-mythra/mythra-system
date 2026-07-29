<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('talent_skills', function (Blueprint $table) {

            $table->id();

            $table->foreignId('talent_profile_id')
                ->constrained('talent_profiles')
                ->cascadeOnDelete();

            $table->foreignId('skill_id')
                ->constrained('skills')
                ->cascadeOnDelete();

            $table->enum('nivel', [
                'basico',
                'intermediario',
                'avancado',
                'especialista'
            ])
            ->default('basico');

            $table->integer('anos_experiencia')
                ->nullable();

            $table->timestamps();

            $table->unique([
                'talent_profile_id',
                'skill_id'
            ]);

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('talent_skills');
    }
};