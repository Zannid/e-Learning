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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('foto')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            
             // Tambahkan kolom role di sini
            $table->enum('role', ['admin', 'guru', 'siswa'])->default('siswa');
            $table->unsignedBigInteger('id_kelas')->nullable();
            $table->unsignedBigInteger('id_tahun_ajaran')->nullable();
            
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('set null');
            $table->foreign('id_tahun_ajaran')->references('id')->on('tahun_ajarans')->onDelete('set null');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
