<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MasyarakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('masyarakat')->insert([
            'nik' => '2002266768686478',
            'nama' => 'John Doe',
            'username' => 'John',
            'password' => Hash::make('john1234'),
            'telepon' => '087689564864',
            'level' => 'masyarakat',
            'created_at' => now(),
           'updated_at' => now()
        ]);
    }
}
