<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $guarded = 'id';

   protected  $dates   =  [
	'tanggal_tanggapan', 'created_at', 'updated_at'
   ];
   
    protected $table = 'tanggapan';
   
    protected $fillable = [
       'id_pengaduan', 'tanggal_tanggapan', 'tanggapan', 'id_petugas', 'id_masyarakat'
   ];
   
    public function pengaduan(){
         return $this->belongsTo(Pengaduan::class, 'id_pengaduan');
    }

	public function petugas(){
         return $this->belongsTo(Petugas::class, 'id_petugas');
    }

	public function masyarakat(){
         return $this->belongsTo(Masyarakat::class, 'id_masyarakat');
    }
}
