<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Petugas;
use Alert;

class PetugasController extends Controller
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
                  'petugas' => Petugas::orderBy('id', 'desc')->paginate(10),
                  'kata' => ''
            ];

            return view('dashboard.petugas.index', $data);
      }

      /**
      * Search data to show a new route.
      *
      * @return \Illuminate\Http\Response
      */
      public function search(Request $req) {

            $data = [
                  'petugas' => Petugas::where('nama', 'LIKE', '%'. $req->q .'%')->paginate(10),
                  'kata' => 'Menampilkan hasil : '. $req->q
            ];

            return view('dashboard.petugas.index', $data);
      }

      /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
      public function create() {
            return view('dashboard.petugas.create');
      }

      /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
      public function store(Request $req) {
            $req->validate([
                  'nama' => 'required|max:30',
                  'username' => 'required|unique:petugas|max:30',
                  'password' => 'required|min:8',
                  'telepon' => 'required|unique:petugas|max:12',
                  'level' => 'required'
            ], [
                  'required' => ':attribute tidak boleh kosong',
                  'unique' => ':attribute ini sudah digunakan',
                  'level.required' => 'pilih salah satu :attribute',
                  'min' => ':attribute minimal harus :min karakter',
                  'telepon.max' => ':attribute maksimal harus :max digit',
                  'max' => ':attribute maksimal harus :max karakter',
            ]);

            $state = Petugas::create([
                  'nama' => $req->nama,
                  'username' => $req->username,
                  'password' => Hash::make($req->password),
                  'telepon' => $req->telepon,
                  'level' => $req->level
            ]);

            if ($state) {
                  Alert::success('Berhasil!', 'Data berhasil di tambahkan');
            } else {
                  Alert::error('Berhasil!', 'Data gagal di tambahkan');
            }

            return redirect('dashboard/petugas');
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
            $exists = Petugas::find($id);

            if ($exists) {

                  $data = [
                        'petugas' => Petugas::find($id)
                  ];

                  return view('dashboard.petugas.edit', $data);

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
                  'nama' => 'required|max:30',
                  'username' => "required|unique:petugas,username,$id|max:30",
                  'password' => 'nullable|min:8',
                  'telepon' => "required|unique:petugas,telepon,$id|max:12",
                  'level' => 'required'
            ], [
                  'required' => ':attribute tidak boleh kosong',
                  'unique' => ':attribute ini sudah digunakan',
                  'level.required' => 'pilih salah satu :attribute',
                  'min' => ':attribute minimal harus :min karakter',
                  'telepon.max' => ':attribute maksimal harus :max digit',
                  'max' => ':attribute maksimal harus :max karakter',
            ]);
            
            $exists = Petugas::find($id);

            if ($exists) {

                  $state = Petugas::find($id)->update([
                        'nama' => $req->nama,
                        'username' => $req->username,
                        'telepon' => $req->telepon,
                        'level' => $req->level
                  ]);

                  if (isset($req->password)) {
                        Petugas::find($id)->update([
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
            $state = Petugas::find($id)->delete();

            if ($state) {
                  Alert::success('Berhasil!', 'Data berhasil di hapus');
            } else {
                  Alert::error('Terjadi Kesalahan!', 'Data gagal di hapus');
            }

            return back();
      }
}