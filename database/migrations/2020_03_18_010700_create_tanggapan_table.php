<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanggapanTable extends Migration
{
      /**
      * Run the migrations.
      *
      * @return void
      */
      public function up() {
            Schema::create('tanggapan', function (Blueprint $table) {
                  $table->id();
                  $table->unsignedBigInteger('id_pengaduan');
                  $table->foreign('id_pengaduan')
                  ->references('id')
                  ->on('pengaduan')
                  ->onDelete('cascade');
                  $table->timestamp('tanggal_tanggapan');
                  $table->text('tanggapan');
                  $table->unsignedBigInteger('id_petugas')->nullable();
                  $table->foreign('id_petugas')
                  ->references('id')
                  ->on('petugas')
                  ->onDelete('cascade');
                  $table->unsignedBigInteger('id_masyarakat')->nullable();
                  $table->foreign('id_masyarakat')
                  ->references('id')
                  ->on('masyarakat')
                  ->onDelete('cascade');
                  $table->timestamps();
            });
      }

      /**
      * Reverse the migrations.
      *
      * @return void
      */
      public function down() {
            Schema::dropIfExists('tanggapan');
      }
}