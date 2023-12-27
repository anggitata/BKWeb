<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('checks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('register_id');
            $table->dateTime('date')->default(DB::raw('CURRENT_TIMESTAMP')); // Menambahkan kolom dengan nilai default sekarang
            $table->string('notes');
            $table->integer('price');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('checks');
    }
};
