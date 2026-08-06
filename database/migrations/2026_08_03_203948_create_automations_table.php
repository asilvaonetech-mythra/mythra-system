<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('automations', function (Blueprint $table) {
            $table->id();

            $table->string('name', 150);

            $table->text('description')
                ->nullable();

            $table->string('trigger', 100);

            $table->string('action', 100);

            $table->string('status', 30)
                ->default('inactive');

            $table->boolean('is_active')
                ->default(false);

            $table->json('conditions')
                ->nullable();

            $table->json('configuration')
                ->nullable();

            $table->timestamp('last_execution_at')
                ->nullable();

            $table->timestamp('next_execution_at')
                ->nullable();

            $table->timestamps();

            $table->softDeletes();

            $table->index('status');
            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('automations');
    }
};