<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->datetime('tanggal_pengaduan');
            $table->char('nik', 16);
            $table->foreign('nik')->references('nik')->on('masyarakat');
            $table->text('isi_laporan');
            $table->enum('status', ['0', 'proses', 'selesai', 'tolak']);
            $table->string('foto', 255);
            $table->timestamp('verifikasi')->nullable();
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
        Schema::dropIfExists('pengaduan');
    }
}
