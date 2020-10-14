<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Masyarakat;
use App\Pengaduan;
use App\Tanggapan;
use App\Petugas;
use Session;
use Alert;

class LoginController extends Controller
{
      public function masyarakat(Request $req) {

            $req->validate([
                  'username' => 'required|exists:masyarakat|max:30',
                  'password' => 'required|min:8'
            ], [
                  'required' => ':attribute ini tidak boleh kosong',
                  'exists' => ':attribute ini tidak terdaftar',
                  'min' => ':attribute ini minimal harus :min karakter',
                  'max' => ':attribute ini maksimal harus :max karakter'
            ]);

            $username = $req->username;

            if (Masyarakat::where('username', $username)->exists()) {
                  $masyarakat = Masyarakat::where('username', $username)->get();

                  foreach ($masyarakat as $data) {
                        $pass = $data->password;
                  }

                  if ($hash = Hash::check($req->password, $pass)) {

                        foreach ($masyarakat as $data) {

                              Session::put('id', $data->id);
                              Session::put('nik', $data->nik);
                              Session::put('nama', $data->nama);
                              Session::put('username', $data->username);
                              Session::put('password', $data->password);
                              Session::put('telepon', $data->telepon);
                              Session::put('level', $data->level);

                        }

                        return redirect('dashboard');

                  } else {
                        Alert::error('Terjadi Kesalahan!', 'Gagal login, password yang anda masukan salah');
                        return back();
                  }
            } else {
                  Alert::error('Terjadi Kesalahan!', 'Gagal login, username yang anda masukan tidak dikenali');
                  return back();
            }

      }

      public function petugas(Request $req) {

            $req->validate([
                  'username' => 'required|exists:petugas|max:30',
                  'password' => 'required|min:8'
            ], [
                  'required' => ':attribute ini tidak boleh kosong',
                  'exists' => ':attribute ini tidak terdaftar',
                  'min' => ':attribute ini minimal harus :min karakter',
                  'max' => ':attribute ini maksimal harus :max karakter'
            ]);

            $username = $req->username;

            if (Petugas::where('username', $username)->exists()) {
                  $petugas = Petugas::where('username', $username)->get();

                  foreach ($petugas as $data) {
                        $pass = $data->password;
                  }

                  if ($hash = Hash::check($req->password, $pass)) {

                        foreach ($petugas as $data) {

                              Session::put('id', $data->id);
                              Session::put('nama', $data->nama);
                              Session::put('username', $data->username);
                              Session::put('password', $data->password);
                              Session::put('level', $data->level);
                              Session::put('telepon', $data->telepon);

                        }

                        return redirect('dashboard');

                  } else {
                        Alert::error('Terjadi Kesalahan!', 'Gagal login, password yang anda masukan salah');
                        return back();
                  }
            } else {
                  Alert::error('Terjadi Kesalahan!', 'Gagal login, username yang anda masukan tidak dikenali');
                  return back();
            }

      }

      public function loginPetugas() {
            if (Session::get('level') == true) {
                  return redirect('/dashboard');
            }

            return view('auth.auth-login-petugas');
      }

      public function showLogin() {
            if (Session::get('level') == true) {
                  return redirect('/dashboard');
            }
            
            return view('auth.auth-login');
      }

      public function successLogin() {

            if (Session::get('level') == false) {
                  return redirect('/login');
            }

            return view('dashboard.index');
      }

      public function logout() {
            Session::flush();
            return redirect('login');
      }

}