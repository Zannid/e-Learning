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
            Schema::create('tugas', function (Blueprint $table) {
                $table->id();
                $table->string('kode_tugas')->unique();
                $table->string('judul');
                $table->integer('jumlah_soal');
                $table->string('foto')->nullable();
                $table->unsignedBigInteger('id_mapel');
                $table->timestamp('tenggat_waktu')->nullable();
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
            Schema::dropIfExists('tugas');
        }
    };
