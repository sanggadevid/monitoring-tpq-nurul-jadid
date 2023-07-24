<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_mtrsemesteran', function (Blueprint $table) {
            $table->id();   
            $table->integer('catatan_id');
            $table->integer('santri_id');
            $table->integer('guru_id');
            $table->integer('kelas_id');
            $table->string('mtrsemesteran_sholat')->nullable();
            $table->string('mtrsemesteran_doa_harian')->nullable();
            $table->string('mtrsemesteran_surah_pendek')->nullable();
            $table->string('mtrsemesteran_quran')->nullable();
            $table->date('mtrsemesteran_tgl')->nullable();
      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
     public function down(): void
    {
        Schema::dropIfExists('tbl_mtrsemesteran');
    }
};
