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
        Schema::create('ticket_system',function(Blueprint $table){
            $table->id();
            $table->decimal('price');
            $table->unsignedBigInteger('movie_id');
            $table->unsignedBigInteger('category_id');
            $table->string('auditoriam_id',255);
            // $table->unsignedBigInteger('auditoriam_id');
            $table->softDeletes();
            $table->timestamps();
            // $table->foreign('auditoriam_id')->references('id')->on('auditoriam');
            $table->foreign('category_id')->references('id')->on('category');
            $table->foreign('movie_id')->references('id')->on('movie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_system');
    }
};
