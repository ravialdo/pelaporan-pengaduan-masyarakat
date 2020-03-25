<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaduan;
use App\Tanggapan;
use Session;
use Alert;

class TanggapanController extends Controller
{
	
	public function __construct(){
		$this->middleware([
			'privilege:admin&petugas',
		]);
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
           'tanggapan' => Tanggapan::orderBy('id', 'desc')->paginate(10),
           'pengaduan' => Pengaduan::where('status', '!=', '0')->orderBy('id', 'desc')->paginate(10)
        ];
      
        return view('dashboard.tanggapan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $pengaduan = Pengaduan::find($req->id);

	   $state = $pengaduan->tanggapan()->create([
			'tanggal_tanggapan' => now(),
			'tanggapan' => $req->tanggapan,
			'id_petugas' => Session::get('id')
	    ]);
	
		return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $state = Pengaduan::find($id);

	   if($state == false){
		 	Alert::error('Terjadi kesalahan!', 'Pengaduan tidak ditemukan');
			return back();
		 }
		if($state->status == 'proses' && $state->verifikasi != null){
			  $data = [
           		 'pengaduan' => $state,
				 'tanggapan' => Tanggapan::where('id_pengaduan', $id)->orderBy('id', 'desc')->get()
         		   ];
			}else{
				Alert::error('Terjadi kesalahan!', 'Pengaduan tidak ditemukan');
				return back();
			}
         
        return view('dashboard.tanggapan.create', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
			'tanggapan' => Tanggapan::find($id)
	   ];
	
	   return view('dashboard.tanggapan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $tanggapan = Tanggapan::find($id);
	   $state = $tanggapan->update([
			'tanggapan' => $req->tanggapan
		]);
		
		if($state){
				Alert::success('Berhasil!', 'Tanggapan berhasil di edit');
			}else{
				Alert::error('Terjadi kesalahan!', 'Tanggapan gagal di edit');
			}
		return redirect('dashboard/tanggapan/'. $tanggapan->id_pengaduan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $state = Tanggapan::find($id)->delete();
		
		if($state){
				Alert::success('Berhasil!', 'Tanggapan berhasil di hapus');
			}else{
				Alert::error('Terjadi kesalahan!', 'Tanggapan gagal di hapus');
			}
			
		return back();
    }
}
