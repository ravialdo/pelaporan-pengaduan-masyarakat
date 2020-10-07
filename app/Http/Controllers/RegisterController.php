<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Masyarakat;
use Session;
use Alert;

class RegisterController extends Controller
{
    public function masyarakat(Request $req){
       
      $message = [
         'required' => ':attribute tidak boleh kosong',
         'numeric' => ':attribute harus berupa angka',
         'string' => ':attribute harus berupa huruf',
         'min' => ':attribute minimal harus :min karakter',
         'max' => ':attribute maksimal harus :max karakter',
         'unique' => ':attribute ini sudah digunakan'
      ];
      
      $req->validate([
         'nik' => 'required|numeric|min:16',
         'nama' => 'required|string|max:25',
         'username' => 'required|unique:masyarakat|string|max:25',
         'password' => 'required|min:8',
         'telepon' => 'required|unique:masyarakat|min:11|max:12'
      ], $message);
      
      $state = Masyarakat::create([
         'nik' => $req->nik,
         'nama' => $req->nama,
         'username' => $req->username,
         'password' => Hash::make($req->password),
         'telepon' => $req->telepon,
      ]);
      
      if($state){
	
         Alert::success('Berhasil!', 'Akun anda telah berhasil di daftarkan, silahkan login!');
         return redirect('login');
         
         }else{
            
            return back();
            
         }
      
    }
   
    public function showRegister(){
      
        if(Session::get('nik') == true){
             return redirect('dashboard');
         } 
         
         return view('auth.auth-register');
    }
   
}
