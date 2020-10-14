<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    protected $guarded = 'id';
   
    protected $table = 'masyarakat';
   
   protected $fillable = [
      'nik', 'nama', 'username', 'password','level', 'telepon'
   ];
   
    public function pengaduan(){
       return $this->hasMany(Pengaduan::class);
    }
   
}
