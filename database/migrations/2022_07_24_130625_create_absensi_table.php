<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->increments('id_absensi');
            $table->unsignedInteger('id_kelas');
            $table->unsignedInteger('id_siswa');
            $table->date('tgl_absen');
            $table->enum('status_kehadiran', ['0', '1', '2']);
            $table->integer('pertemuan_ke');
            $table->timestamps();
            $table->foreign('id_siswa')->references('id_siswa')->on('siswa')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensi');
    }
}
