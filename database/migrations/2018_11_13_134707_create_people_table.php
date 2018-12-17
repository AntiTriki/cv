<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('nombre');
            $table->string('apellido_p');
            $table->string('apellido_m');
            $table->string('ci');
            $table->boolean('sexo');
            $table->boolean('admin')->default(false);
            $table->integer('telefono')->nullable();
            $table->integer('celular')->nullable();
            $table->date('birthday');
            $table->integer('children')->default(0);
            $table->boolean('drivecard')->nullable();
            $table->string('mail')->nullable();
            $table->integer('civil')->nullable();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
