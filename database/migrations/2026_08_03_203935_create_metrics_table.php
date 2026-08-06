<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('metrics', function (Blueprint $table) {
            $table->id();

            $table->string('name', 150);

            $table->string('type', 50);

            $table->decimal('value', 15, 2)
                ->default(0);

            $table->string('source')
                ->nullable();

            $table->date('measured_at');

            $table->foreignId('campaign_id')
                ->nullable()
                ->constrained('campaigns')
                ->nullOnDelete();

            $table->foreignId('publication_id')
                ->nullable()
                ->constrained('publications')
                ->nullOnDelete();

            $table->json('metadata')
                ->nullable();

            $table->timestamps();

            $table->softDeletes();

            $table->index('type');
            $table->index('measured_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('metrics');
    }
};