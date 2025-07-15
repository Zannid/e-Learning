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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('kode_quiz')->unique();
            $table->string('judul');
            $table->integer('jumlah_soal');
            $table->unsignedBigInteger('id_mapel');
            $table->string('foto')->nullable();
            $table->timestamp('tenggat_waktu')->nullable();
            $table->integer('durasi');
            $table->timestamps();
            $table->foreign('id_mapel')->references('id')->on('mapels')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizzes');
    }
};
