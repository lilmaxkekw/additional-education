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
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();
            $table->string('name')->nullable();
            $table->string('number_hours')->nullable();
            $table->string('status')->nullable();

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
