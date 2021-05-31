<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            //
//            $table->string('phone_number', 12);
            $table->date('birthday');
            $table->string('place_of_residence');
            $table->string('platform_address')->default('Большая Санкт-Петербургская ул., 46, Великий Новгород');
            $table->integer('insurance_number');
//           $table->string('name_of_competence');

            //
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('status_application')->default(0);

            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('applications');
    }
}
