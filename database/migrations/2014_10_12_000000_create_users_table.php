<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->softDeletes();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('apellido_p')->nullable();
            $table->string('apellido_m')->nullable();
            $table->string('ci')->nullable();
            $table->boolean('sexo')->default(true);
            $table->integer('telefono')->nullable();
            $table->integer('celular')->nullable();
            $table->date('birthday')->nullable();
            $table->integer('children')->default(0);
            $table->boolean('drivecard')->nullable();
            $table->integer('civil')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->string('residencia')->nullable();
            $table->string('image')->default('default_user.png');
            $table->integer('permiso')->default(0);;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
