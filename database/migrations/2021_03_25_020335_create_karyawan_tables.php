<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawanTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ptsRizziq', function (Blueprint $table) {
            $table->id();
            $table->string('namaKaryawan', 255);
            $table->tinyInteger('hadirMasuk');
            $table->tinyInteger('izinMasuk');
            $table->tinyInteger('bolosMasuk');
            $table->tinyInteger('telatMasuk');
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
        Schema::dropIfExists('ptsRizziq');
    }
}
