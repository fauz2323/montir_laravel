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
        Schema::create('data_pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('pelanggan');
            $table->string('nama_montir');
            $table->text('keluhan');
            $table->string('total');
            $table->string('jenis_servis');
            $table->text('spare_part');
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
        Schema::dropIfExists('data_pembayarans');
    }
};
