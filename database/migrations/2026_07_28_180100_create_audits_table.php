<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{


    /**
     * Executa migration.
     */
    public function up(): void
    {

        Schema::create('audits', function (Blueprint $table) {


            $table->id();


            $table->foreignId('user_id')

                ->nullable()

                ->constrained('users')

                ->nullOnDelete();



            $table->string('module')

                ->index();



            $table->string('action')

                ->index();



            $table->string('model');



            $table->unsignedBigInteger('model_id')

                ->nullable();



            $table->json('old_values')

                ->nullable();



            $table->json('new_values')

                ->nullable();



            $table->ipAddress('ip_address')

                ->nullable();



            $table->text('user_agent')

                ->nullable();



            $table->timestamps();



            $table->index([

                'model',

                'model_id'

            ]);



        });


    }



    /**
     * Reverte migration.
     */
    public function down(): void
    {

        Schema::dropIfExists('audits');

    }


};