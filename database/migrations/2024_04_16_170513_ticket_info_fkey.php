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
        Schema::table('ticket_info',function(Blueprint $table){
            // $table->foreign('movie_id')
            // ->references('id')
            // ->on('movie');
  
    //   $table->foreign('category_id')
    //         ->references('id')
    //         ->on('category')
    //         ->onDelete('cascade');
  
      $table->foreign('auditoriam_id')
            ->references('id')
            ->on('auditoriam')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticket_info', function (Blueprint $table) {
            $table->dropForeign(['movie_id','category_id','auditoriam_id']);
        });
    }
};
