<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageStampTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_stamp', function (Blueprint $table) {
            $table->increments('id');
            $table->string('current_image');
            $table->string('image_change');
            $table->integer('stamp_id')->unsigned();
            $table->foreign('stamp_id')->references('id')->on('stamp')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_stamp');
    }
}
