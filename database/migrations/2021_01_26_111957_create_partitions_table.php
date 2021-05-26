<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Разделы
        Schema::create('partitions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_start');
            $table->date('date_end');
            $table->string('name');
            $table->string('number_hours');
            $table->string('status')->default(NULL);

            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses');

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
        Schema::dropIfExists('partitions');
    }
}
