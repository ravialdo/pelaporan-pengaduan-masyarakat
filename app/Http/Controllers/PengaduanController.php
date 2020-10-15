<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaduan;
use Alert;
use File;

class PengaduanController extends Controller
{
	public function __construct(){
		$this->middleware([
			'privilege:admin',
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
             'pengaduan' => Pengaduan::orderBy('id', 'desc')->paginate(10),
             'kata' => ''
         ];
         
         return view('dashboard.pengaduan.index', $data);
    }
   
    /**
     * Search data to show a new route.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $req){
      
      $data = [
         'pengaduan' => Pengaduan::where('nik', 'LIKE', '%'. $req->q .'%')->paginate(10),
         'kata' => 'Menampilkan hasil : '. $req->q
      ];
      
      return view('dashboard.pengaduan.index', $data);
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
    public function store(Request $request)
    {
        //
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
        $data = [
            'pengaduan' => Pengaduan::find($id)
        ];
      
        return view('dashboard.pengaduan.edit', $data);
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
        $state = Pengaduan::find($id)->update([
            'isi_laporan' => $req->isi_laporan
        ]);
      
        if($req->file('foto') != ''){
            $data = Pengaduan::find($id);
            
            $old_file = $data->foto;
            $new_file = $req->file('foto');
            $new_file_name = time(). '_' .$new_file->getClientOriginalName();
            
            $state = $data->update([
               'foto' => $new_file_name
            ]);
            
            File::delete('public/files/'. $old_file);
            $new_file->move('public/files/', $new_file_name);
         
        }
      
        if($state){
            Alert::success('Berhasil!', 'Data berhasil di edit');
         }else{
            Alert::error('Terjadi Kesalahan!', 'Data gagal di edit');
         }
      
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $state = Pengaduan::find($id);
      
        if($state){
               Pengaduan::find($id)->delete();
               File::delete('public/files/'. $state->foto);
               
               Alert::success('Berhasil!', 'Data berhasil di hapus');
           }else{
              Alert::error('Terjadi Kesalahan!', 'Data gagal di hapus');
           }
         
         return back();
    }
	
}
