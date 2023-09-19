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
        Schema::create('bookticket', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movieid');
            $table->json('seatbook');
            $table->tinyInteger('status')->default(1);
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('movieid')->references('id')->on('movie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookticket');
    }
};
