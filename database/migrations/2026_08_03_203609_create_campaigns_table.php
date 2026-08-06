<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();

            $table->string('name', 150);

            $table->string('slug')
                ->unique();

            $table->text('description')
                ->nullable();

            $table->string('type', 50);

            $table->string('status', 30)
                ->default('draft');

            $table->string('objective')
                ->nullable();

            $table->decimal('budget', 15, 2)
                ->default(0);

            $table->timestamp('starts_at')
                ->nullable();

            $table->timestamp('ends_at')
                ->nullable();

            $table->json('settings')
                ->nullable();

            $table->timestamps();

            $table->softDeletes();

            $table->index('type');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};