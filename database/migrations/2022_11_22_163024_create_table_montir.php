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
        Schema::create('montir', function (Blueprint $table) {
            $table->id();
            $table->string('nama',50);
            $table->enum('gender', ['L', 'P']);
            $table->text('alamat');
            $table->string('nomor_telepon',12);
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
        Schema::dropIfExists('montir');
    }
};
