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
        Schema::create('employeeresume', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->string('name');
            $table->string('address');
            $table->string('position');
            $table->string('resume');
            $table->integer('hr_status')->comment('0=Resume not viewed,1= Resume Viewed,2=Resume Downloaded,3=Shortlisted');
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
        Schema::dropIfExists('employeeresume');
    }
};
