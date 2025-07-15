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
        Schema::create('soal_tugas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tugas');
            $table->text('pertanyaan');
            $table->string('foto')->nullable();
            $table->string('pilihan_a', 255);
            $table->string('pilihan_b', 255);
            $table->string('pilihan_c', 255);
            $table->string('pilihan_d', 255);
            $table->enum('jawaban_benar', ['A', 'B', 'C', 'D']);
            $table->foreign('id_tugas')->references('id')->on('tugas')->onDelete('cascade');
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
        Schema::dropIfExists('soal_tugas');
    }
};
