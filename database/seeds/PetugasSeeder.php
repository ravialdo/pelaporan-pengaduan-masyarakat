<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('petugas')->insert([
           'nama' => 'admin',
           'username' => 'admin',
           'password' => Hash::make('admin'),
           'telepon' => '082765875379',
           'level' => 'admin',
           'created_at' => now(),
           'updated_at' => now()
        ]);
      
        DB::table('petugas')->insert([
           'nama' => 'petugas',
           'username' => 'petugas',
           'password' => Hash::make('petugas'),
           'telepon' => '089476376964',
           'level' => 'petugas',
           'created_at' => now(),
           'updated_at' => now()
        ]);
    }
}
