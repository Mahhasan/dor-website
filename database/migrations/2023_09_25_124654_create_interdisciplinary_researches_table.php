<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interdisciplinary_researches', function (Blueprint $table) {
            $table->id();
            $table->string('discipline');
            $table->string('lab_name');
            $table->string('lab_number')->nullable();
            $table->string('link')->nullable();
            $table->json('picture')->nullable();
            $table->string('person_name')->nullable();
            $table->string('designation')->nullable();
            $table->string('cell')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interdisciplinary_researches');
    }
};
