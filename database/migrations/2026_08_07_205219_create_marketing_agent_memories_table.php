<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('marketing_agent_memories', function (Blueprint $table) {

            $table->id();

            $table->string('agent', 100);

            $table->string('domain', 100);

            $table->string('type', 50);

            $table->string('title', 150);

            $table->longText('content');

            $table->json('metadata')
                ->nullable();

            $table->timestamps();

            $table->softDeletes();


            $table->index('agent');

            $table->index('domain');

            $table->index('type');

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('marketing_agent_memories');
    }
};