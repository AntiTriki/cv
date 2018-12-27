<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            //$table->integer('person_id')->nullable()->unsigned();
            //$table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('available_job')->default(false);
            $table->boolean('travel')->default(false);
            $table->integer('salary')->default(0);
            $table->string('reason')->nullable();
            $table->string('general')->nullable();
            $table->text('description')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('forms');
    }
}
