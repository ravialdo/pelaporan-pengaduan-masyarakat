<?php

use Illuminate\Database\Seeder;

class PengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengaduan')->insert([
            'tanggal_pengaduan' => now(),
            'nik' => '2002266768686478',
            'isi_laporan' => 'Telah Terjadi kebakaran!',
            'foto' => 'example-img.jpg',
            'status' => '0',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
