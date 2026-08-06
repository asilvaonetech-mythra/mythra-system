<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('social_networks', function (Blueprint $table) {
            $table->id();

            $table->string('name', 100);

            $table->string('provider', 100);

            $table->string('username')
                ->nullable();

            $table->string('profile_url')
                ->nullable();

            $table->text('access_token')
                ->nullable();

            $table->text('refresh_token')
                ->nullable();

            $table->timestamp('token_expires_at')
                ->nullable();

            $table->boolean('is_active')
                ->default(true);

            $table->json('settings')
                ->nullable();

            $table->timestamps();

            $table->softDeletes();

            $table->index('provider');
            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('social_networks');
    }
};