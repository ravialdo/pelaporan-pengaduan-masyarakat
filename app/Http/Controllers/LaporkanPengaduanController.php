<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaduan;
use App\Tanggapan;
use Session;
use Alert;

class LaporkanPengaduanController extends Controller
{
	public function __construct(){
		$this->middleware([
			'privilege:masyarakat',
		]);
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.laporkan-pengaduan.index');
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
      $req->validate([
            'isi_laporan' => 'required|max:100',
            'foto' => 'required|mimes:png,jpeg,jpg'
      ],[
            'required' => ':attribute tidak boleh kosong',
            'foto.required' => 'tidak ada :attribute yang dipilih',
            'mimes' => 'format :attribute harus berupa png,jpg,jpeg'
      ]);
      
      $file = $req->file('foto');
      $file_name = time(). '-' .$file->getClientOriginalName();
      
      $state = Pengaduan::create([
         'tanggal_pengaduan' => $req->tanggal_pengaduan,
         'nik' => $req->nik,
         'isi_laporan' => $req->isi_laporan,
         'foto' => $file_name,
         'status' => '0'
      ]);
      
      if($state){
            $folder = 'files';
            $file->move($folder, $file_name);
            
            Alert::success('Berhasil!', 'Pengaduan telah terkirim');
            return back()->with('status', 'Pengaduan yang anda laporkan akan kami verifikasi terlebih dahulu, tunggu tanggapan yang akan kami kirimkan mengenai pengaduan yang anda laporkan.');
         }else{
            Alert::error('Terjadi Kesalahan!', 'Pengaduan gagal dikirim');
            return back();
         }
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

	
	
	public function riwayatSearch(Request $req){
	 	$pengaduan = Pengaduan::where(
	   	'nik', Session::get('nik')
	   )->get();
		
		$data = [
			'pengaduan' => Pengaduan::where([
			 ['nik', Session::get('nik')],
			 ['isi_laporan', 'like', '%'. $req->q .'%'],
			])->orderBy('id', 'desc')->get(),
			
			'kata' => 'Menanpilkan hasil : '. $req->q,
		];
	 
		return view('dashboard.pengaduan.riwayat', $data);
	}
	
	public function lihatTanggapan($id){
	 	$state = Pengaduan::find($id);
		
		if($state){
	
			$data = [
				
				'Pengaduan' => $state,
				'tanggapan' => Tanggapan::where('id_pengaduan', $id)->orderBy('id', 'desc')->get(),
			];
				
		    }else{
				Alert::error('Terjadi Kesalahan!', 'Data Pengaduan tidak ditemukan');
				return back();
		    }
		
		return view('dashboard.pengaduan.tanggapan', $data);
	}
}
