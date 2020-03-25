<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $guarded = 'id';
   
    protected $table = 'pengaduan';

	protected $dates = [
		'tanggal_pengaduan', 'verifikasi', 'created _at', 'updated_at'
	];
   
    protected $fillable = [
       'tanggal_pengaduan', 'nik', 'isi_laporan', 'foto', 'status', 'verifikasi'
    ];
    
    public function masyarakat(){
       return $this->belongsTo(Masyarakat::class, 'nik', 'nik');
    }
   
   public function tanggapan(){
       return $this->hasMany(Tanggapan::class, 'id_pengaduan');
    }

	public function tanggapanMasyarakat(){
       return $this->hasMany(TanggapanMasyarakat::class, 'id_pengaduan');
    }
}
