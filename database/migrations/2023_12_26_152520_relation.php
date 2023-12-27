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
        Schema::table('registers', function (Blueprint $table) {
            $table->foreign('schedule_id')->references('id')->on('schedules');
            $table->foreign('patient_id')->references('id')->on('patients');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('clinic_id')->references('id')->on('clinics');
        });

        Schema::table('schedules', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        
        Schema::table('checks', function (Blueprint $table) {
            $table->foreign('register_id')->references('id')->on('registers');
        });

        Schema::table('detail_checks', function (Blueprint $table) {
            $table->foreign('medicine_id')->references('id')->on('medicines');
            $table->foreign('check_id')->references('id')->on('checks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
