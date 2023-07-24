<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_mtrbulanan', function (Blueprint $table) {
            $table->id();   
            $table->integer('santri_id');
            $table->integer('guru_id');
            $table->integer('kelas_id');
            $table->string('mtrbulanan_sholat')->nullable();
            $table->string('mtrbulanan_doa_harian')->nullable();
            $table->string('mtrbulanan_surah_pendek')->nullable();
            $table->string('mtrbulanan_quran')->nullable();
            $table->string('list_sholat')->nullable();
            $table->string('list_doa_harian')->nullable();
            $table->string('list_surah_pendek')->nullable();
            $table->string('list_quran')->nullable();
            $table->date('mtrbulanan_tgl')->nullable();
            $table->integer('nilai_solat');
            $table->integer('nilai_doa_harian');
            $table->integer('nilai_surah_pendek');
            $table->integer('nilai_quran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
     public function down(): void
    {
        Schema::dropIfExists('tbl_mtrbulanan');
    }
};
