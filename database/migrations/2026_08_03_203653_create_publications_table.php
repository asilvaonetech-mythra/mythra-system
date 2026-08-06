<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();

            $table->foreignId('campaign_id')
                ->nullable()
                ->constrained('campaigns')
                ->nullOnDelete();

            $table->foreignId('social_network_id')
                ->nullable()
                ->constrained('social_networks')
                ->nullOnDelete();

            $table->string('title', 150);

            $table->longText('content');

            $table->string('status', 30)
                ->default('draft');

            $table->timestamp('scheduled_at')
                ->nullable();

            $table->timestamp('published_at')
                ->nullable();

            $table->json('metadata')
                ->nullable();

            $table->timestamps();

            $table->softDeletes();

            $table->index('status');
            $table->index('scheduled_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};