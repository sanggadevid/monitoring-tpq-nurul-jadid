<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_mtrharian', function (Blueprint $table) {
            $table->id();   
            $table->integer('catatan_id');
            $table->integer('santri_id');
            $table->integer('guru_id');
            $table->integer('kelas_id');
            $table->string('catatan_hari')->nullable();
            $table->string('catatan_tanggal')->nullable();
            $table->string('catatan_laporan')->nullable();
            $table->date('catatan_tgl')->nullable();
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
     public function down(): void
    {
        Schema::dropIfExists('tbl_mtrharian');
    }
};
