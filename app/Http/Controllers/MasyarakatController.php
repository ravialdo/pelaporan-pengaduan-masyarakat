<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Masyarakat;
use Alert;

class MasyarakatController extends Controller
{

      public function __construct() {
            $this->middleware([
                  'privilege:admin',
            ]);
      }

      /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
      public function index() {
            $data = [
                  'masyarakat' => Masyarakat::orderBy('id', 'desc')->paginate(10),
                  'kata' => ''
            ];

            return view('dashboard.masyarakat.index', $data);
      }

      /**
      * Search data to show a new route.
      *
      * @return \Illuminate\Http\Response
      */
      public function search(Request $req) {

            $data = [
                  'masyarakat' => Masyarakat::where('nama', 'LIKE', '%'. $req->q .'%')->paginate(10),
                  'kata' => 'Menampilkan hasil : '. $req->q
            ];

            return view('dashboard.masyarakat.index', $data);
      }

      /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
      public function create() {
            return view('dashboard.masyarakat.create');
      }

      /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
      public function store(Request $req) {
            $req->validate([
                  'nik' => 'required|unique:masyarakat|min:16|max:16',
                  'nama' => 'required|max:30',
                  'username' => 'required|unique:masyarakat|min:10',
                  'password' => 'required|min:8',
                  'telepon' => 'required|unique:masyarakat|max:12'
            ], [
                  'required' => ':attribute tidak boleh kosong',
                  'unique' => ':attribute ini sudah digunakan',
                  'min' => ':attribute minimal harus :min karakter',
                  'nik.min' => ':attribute minimal harus :min digit',
                  'max' => ':attribute maksimal harus :max karakter',
                  'nik.max' => ':attribute makskmal harus :max digit',
                  'telepon.max' => ':attribute maksimal harus :max digit',
            ]);

            $state = Masyarakat::create([
                  'nik' => $req->nik,
                  'nama' => $req->nama,
                  'username' => $req->username,
                  'password' => Hash::make($req->password),
                  'telepon' => $req->telepon,
            ]);

            if ($state) {
                  Alert::success('Berhasil!', 'Data berhasil di tambahkan');
            } else {
                  Alert::error('Terjadi Kesalahan!', 'Data gagal di tambahkan');
            }

            return redirect('dashboard/masyarakat');
      }

      /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function show($id) {
            //
      }

      /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function edit($id) {

            $exists = Masyarakat::find($id);

            if ($exists) {

                  $data = [
                        'masyarakat' => Masyarakat::find($id)
                  ];

                  return view('dashboard.masyarakat.edit', $data);

            } else {

                  Alert::error('Terjadi Kesalahan!', 'Data tidak ditemukan');
                  return back();
            }

      }

      /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function update(Request $req, $id) {
            
            $req->validate([
                  'nik' => "required|unique:masyarakat,nik,$id|min:16|max:16",
                  'nama' => 'required|max:30',
                  'username' => "required|unique:masyarakat,username,$id|min:10",
                  'password' => 'nullable|min:8',
                  'telepon' => "required|unique:masyarakat,telepon,$id|max:12"
            ], [
                  'required' => ':attribute tidak boleh kosong',
                  'unique' => ':attribute ini sudah digunakan',
                  'min' => ':attribute minimal harus :min karakter',
                  'nik.min' => ':attribute minimal harus :min digit',
                  'max' => ':attribute maksimal harus :max karakter',
                  'nik.max' => ':attribute makskmal harus :max digit',
                  'telepon.max' => ':attribute maksimal harus :max digit',
            ]);

            $exists = Masyarakat::find($id);

            if ($exists) {

                  $state = Masyarakat::find($id)->update([
                        'nik' => $req->nik,
                        'nama' => $req->nama,
                        'username' => $req->username,
                        'telepon' => $req->telepon,
                  ]);

                  if (isset($req->password)) {
                        Masyarakat::find($id)->update([
                              'password' => Hash::make($req->password)
                        ]);
                  }

                  if ($state) {
                        Alert::success('Berhasil!', 'Data berhasil di edit');
                  } else {
                        Alert::error('Terjadi Kesalahan!', 'Data gagal di edit');
                  }
            } else {
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
      public function destroy($id) {
            $state = Masyarakat::find($id)->delete();

            if ($state) {
                  Alert::success('Berhasil!', 'Data berhasil di hapus');
            } else {
                  Alert::error('Terjadi Kesalahan!', 'Data gagal di hapus');
            }

            return back();

      }

}