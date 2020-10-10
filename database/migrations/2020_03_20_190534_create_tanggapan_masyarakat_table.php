<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanggapanMasyarakatTable extends Migration
{
      /**
      * Run the migrations.
      *
      * @return void
      */
      public function up() {
            Schema::create('tanggapan_masyarakat', function (Blueprint $table) {
                  $table->id();
                  $table->unsignedBigInteger('id_pengaduan');
                  $table->foreign('id_pengaduan')
                  ->references('id')
                  ->on('pengaduan')
                  ->onDelete('cascade');
                  $table->timestamp('tanggal_tanggapan');
                  $table->text('tanggapan');
                  $table->unsignedBigInteger('id_masyarakat');
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
            Schema::dropIfExists('tanggapan_masyarakat');
      }
}