<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('research_ethics_committees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->string('designation');
            $table->string('committee_name');
            $table->string('position');
            $table->timestamps();
            // foreign key with onDelete('cascade')
            $table->foreign('department_id')
            ->references('id')
            ->on('departments')
            ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('research_ethics_committees');
    }
};
