<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_santri', function (Blueprint $table) {
            $table->id();   
            $table->integer('kelas_id');
            $table->string('santri_nis')->nullable();
            $table->string('santri_nama')->nullable();
            $table->string('santri_jk')->nullable();
            $table->string('santri_tmp_lhr')->nullable();
            $table->string('santri_tgl_lhr')->nullable();
            $table->text('santri_alamat')->nullable();
 
         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
     public function down(): void
    {
        Schema::dropIfExists('tbl_santri');
    }
};
