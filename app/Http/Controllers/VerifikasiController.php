<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaduan;
use Alert;
use File;

class VerifikasiController extends Controller
{
	
	public function __construct(){
		$this->middleware([
			'privilege:admin&petugas',
		]);
	}
	
    /**
     * View index  for a new route
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data = [
             'pengaduan' => Pengaduan::where([
				['verifikasi', null], ['status', '0'],
			])->orderBy('id', 'desc')->paginate(10),
			'count_validasi' => Pengaduan::where([
				['verifikasi', '!=', null], ['status', '0'],
			])->count(),
			'tolak' => Pengaduan::where('status', 'tolak')->count(),
               'kata' => ''
         ];
         
         return view('dashboard.verifikasi.index', $data);
    }

    /**
     * Verification data  for a new route
     *
     * @return \Illuminate\Http\Response
     */
    public function verification($id)
    {
         $state = Pengaduan::find($id);

		if($state){
			$state->update([
				'verifikasi' => now()
			]);
				
			Alert::success('Berhasil!', 'Pengaduan berhasil di verifikasi');
		   	return redirect('dashboard/verifikasi/view/validasi');
		  }
    }

    /**
     * View index  for a new route
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
         $data = [
			'pengaduan' => Pengaduan::where([
				['verifikasi', '!=', null], ['status', '0'],
			])->orderBy('id', 'desc')->paginate(10),
			'kata' => ''
         ];

		return view('dashboard.verifikasi.show', $data);
    }

    /**
     * Search data  for a new route
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $req)
    {
         $data = [
			'pengaduan' => Pengaduan::where([
				['verifikasi', null], ['isi_laporan', 'like', '%'. $req->q .'%'],	
			])->paginate(10),
			'kata' => 'Menampilkan hasil : '. $req->q,
			'count_validasi' => Pengaduan::where([
				['verifikasi', '!=', null], ['status', '0'],
			])->count(),
			'tolak' => Pengaduan::where('status', 'tolak')->count(),
		];
		
		return view('dashboard.verifikasi.index', $data);
    }

	/**
     * Search data  for a new route
     *
     * @return \Illuminate\Http\Response
     */
    public function searchValid(Request $req)
    {
         $data = [
			'pengaduan' => Pengaduan::where([
				['verifikasi', '!=', null], ['status', '0'], ['isi_laporan', 'like', '%'. $req->q .'%'],	
			])->paginate(10),
			'kata' => 'Menampilkan hasil : '. $req->q,
		];
		
		return view('dashboard.verifikasi.show', $data);
    }

	/**
     * View index  for a new route
     *
     * @return \Illuminate\Http\Response
     */
    public function validation($id)
    {
         $data = [
			'pengaduan' => Pengaduan::find($id)
		];
		
		return view('dashboard.verifikasi.validasi', $data);
    }

	/**
     * Proses .data for a new route
     *
     * @return \Illuminate\Http\Response
     */
    public function process($id)
    {
         $state = Pengaduan::find($id);

		if($state){
				$state->update([
					'status' => 'proses'
				]);
				
				Alert::success('Berhasil!', 'Pengaduan berhasil di proses');
				return redirect('dashboard/verifikasi/view/validasi');
		    }else{
				Alert::error('Terjadj kesalahan!', 'Pengaduan gagal di proses');
		    }
		return back();
    }

	public function tolak($id){
		$state = Pengaduan::find($id)->update([
			'status' => 'tolak'
		]);
		
		if($state){
				Alert::success('Berhasil!', 'Data pengaduan berhasil di tolak');
			}else{
				Alert::error('Terjadi kesalahan!', 'Data pengaduan gagal di tolak');
			}
	
		return back();
	}
	
	 public function showTolak(){
	 	$data = [
			'pengaduan' => Pengaduan::where([
				['status', 'tolak'],
			])->orderBy('id', 'desc')->paginate(),
			'kata' => '',
		];
		
		return view('dashboard.verifikasi.tolak', $data);
	 }
	
	 public function searchTolak(Request $req){
	 	$data = [
			'pengaduan' => Pengaduan::where([
				['status', 'tolak'],
				['isi_laporan', 'like', '%'. $req->q .'%'],
			])->orderBy('id', 'desc')->paginate(),
			'kata' => 'Menampilkan hasil : '. $req->q,
		];
		
		return view('dashboard.verifikasi.tolak', $data);
	 }
	
	 public function pulih($id){
	 	$state = Pengaduan::find($id)->update([
			'status' => '0',
		]);
		
		if($state){
				Alert::success('Berhasil!', 'Data pengaduan berhasil di pulihkan');
			}else{
				Alert::error('Terjadi kesalahan!', 'Data pengaduan gagal di pulihkan');
			}
			
		return back();
	 }

	public function destroy($id){
		$state = Pengaduan::find($id);
		
		if($state){
			
			Pengaduan::find($id)->delete();
               File::delete('files/'. $state->foto);

				Alert::success('Berhasil!', 'Data pengaduan berhasil di hapus');
			}else{
				Alert::error('Terjadi kesalahan!', 'Data pengaduan gagal di hapus');
			}
	
		return back();
	}
	
}
