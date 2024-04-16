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
        Schema::create('ticket_info',function(Blueprint $table){
            $table->id();
            $table->integer('price');
            $table->integer('movie_id');
            $table->integer('category_id');
            $table->integer('auditoriam_id');
            $table->integer('deleted_at')->nullable();
            $table->dateTime('created_at')->default(date('Y-m-d'));
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_info');
    }
};
