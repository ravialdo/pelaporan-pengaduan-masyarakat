<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $guarded = 'id';
   
    protected $table = 'petugas';
   
    protected $fillable = [
       'nama', 'username', 'password', 'telepon', 'level'
    ];
	
	public function tanggapan(){
		return $this->hasMany(Tanggapan::class);
	}
}
