<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('name')->nullable();
            $table->integer('form_id')->unsigned();
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
            $table->integer('skill_id')->unsigned();
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
            $table->integer('nombre_id')->unsigned();
            $table->foreign('nombre_id')->references('id')->on('names')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('levels');
    }
}
