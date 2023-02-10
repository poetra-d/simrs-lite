<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->bigIncrements('id_pasien');
            $table->date('tanggal');
            $table->string('no_antrian', 150);
            $table->string('nama_pasien', 100);
            $table->unsignedBigInteger('poli_id');
            $table->string('alamat_pasien', 200);
            $table->string('no_telp_pasien', 15);
            $table->timestamps();

            $table->foreign('poli_id')
                ->references('id')
                ->on('polikliniks')
                ->onUpdate('cascade')
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
        Schema::dropIfExists('pasiens');
    }
}