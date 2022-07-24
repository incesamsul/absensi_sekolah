<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalMengajarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_mengajar', function (Blueprint $table) {
            $table->increments('id_jadwal_mengajar');
            $table->unsignedInteger('id_mata_pelajaran');
            $table->unsignedBigInteger('id_guru');
            $table->unsignedInteger('id_kelas');
            $table->unsignedInteger('id_semester');
            $table->unsignedInteger('id_tahun_ajaran');
            $table->string('hari');
            $table->time('jam_mengajar');
            $table->string('jam_ke');
            $table->timestamps();
            $table->foreign('id_mata_pelajaran')->references('id_mata_pelajaran')->on('mata_pelajaran')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_guru')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_semester')->references('id_semester')->on('semester')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_tahun_ajaran')->references('id_tahun_ajaran')->on('tahun_ajaran')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_mengajar');
    }
}
