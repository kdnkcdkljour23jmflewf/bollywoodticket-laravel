<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditoriam_seat',function(Blueprint $table){
            $table->id();
            $table->integer('quantity');
            $table->tinyInteger('status');
            $table->unsignedBigInteger('auditoriam_id');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('auditoriam_id')->references('id')->on('auditoriam');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auditoriam_seat');
    }
};
