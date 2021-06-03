<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Темы
        Schema::create('sections', function (Blueprint $table) {
            $table->bigIncrements('id_section');
            $table->string('name_section');
            $table->string('description_section')->nullable();
            $table->date('date_section')->nullable();
            $table->string('status')->default(NULL);

            $table->unsignedBigInteger('partition_id');
            $table->foreign('partition_id')->references('id')->on('partitions');

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
        Schema::dropIfExists('sections');
    }
}
