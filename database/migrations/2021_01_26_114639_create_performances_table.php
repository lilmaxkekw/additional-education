<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performances', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('mark')->nullable();

            $table->unsignedBigInteger('listener_id');
            $table->unsignedBigInteger('section_id');
            $table->string('status')->nullable();

            $table->foreign('listener_id')->references('id_listener')->on('listeners');
            $table->foreign('section_id')->references('id_section')->on('sections');

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
        Schema::dropIfExists('performances');
    }
}
