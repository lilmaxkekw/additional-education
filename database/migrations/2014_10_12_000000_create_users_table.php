<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('number_phone', 16)->nullable();
            $table->string('password');
            $table->string('photo')->nullable();

            //
            $table->date('birthday')->nullable();
            $table->string('place_of_residence')->nullable();
//            $table->string('platform_address')->default('Большая Санкт-Петербургская ул., 46, Великий Новгород');
            $table->integer('insurance_number')->nullable();

            $table->unsignedBigInteger('role_id')->default(1)->nullable();
            $table->foreign('role_id')->references('id')->on('roles');

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
