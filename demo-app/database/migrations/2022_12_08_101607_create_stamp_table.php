<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStampTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stamp', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('many_time');
            $table->integer('stamp_number');
            $table->integer('app_id')->unsigned();
            $table->foreign('app_id')->references('id')->on('app')->onDelete('cascade');
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
        Schema::dropIfExists('stamp');
    }
}
