<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_guru', function (Blueprint $table) {
            $table->id();   
            $table->integer('kelas_id');
            $table->string('guru_username')->nullable();
            $table->string('guru_password')->nullable();
            $table->string('guru_nama')->nullable();
            $table->string('guru_foto')->nullable();
            $table->string('guru_jk')->nullable();
            $table->string('guru_ttl')->nullable();
            $table->text('guru_alamat')->nullable();
            $table->string('guru_jabatan')->nullable();
            $table->string('guru_nohp')->nullable();
            $table->string('guru_email')->nullable();
 
         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
     public function down(): void
    {
        Schema::dropIfExists('tbl_guru');
    }
};
