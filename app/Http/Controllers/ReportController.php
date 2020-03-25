<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaduan;
use PDF;

class ReportController extends Controller
{
    public function __construct(){
		$this->middleware([
			'privilege:admin',
		]);
	}
	
	public function index(){
		return view('dashboard.report.index');
	}
	
	 public function generate(Request $req){
		
		$data = [
			'pengaduan' => Pengaduan::whereMonth('tanggal_pengaduan', $req->bulan)
				->whereYear('tanggal_pengaduan', $req->tahun)
				->get()
		];
		
		$pdf = PDF::loadView('layouts.laporan', $data);
		
		$file_name = 'pelaporan-pengaduan-masyarakat-'. date('d-m-Y') .'.pdf';
		
		return $pdf->download($file_name);
	}
}
