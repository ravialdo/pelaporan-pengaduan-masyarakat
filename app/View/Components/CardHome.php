<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Masyarakat;
use App\Petugas;
use App\Pengaduan;

class CardHome extends Component
{
  public $masyarakat,
  $petugas,
  $admin,
  $pengaduan;
  public $januari,
  $februari,
  $maret,
  $april,
  $mei,
  $juni,
  $juli,
  $agustus,
  $september,
  $oktober,
  $november,
  $desember;
  /**
  * Create a new component instance.
  *
  * @return void
  */
  public function __construct() {
    $this->masyarakat = Masyarakat::all()->count();
    $this->petugas = Petugas::where('level', 'petugas')->count();
    $this->admin = Petugas::where('level', 'admin')->count();
    $this->pengaduan = Pengaduan::all()->count();

    $year = now()->format('Y');

    $this->januari = Pengaduan::whereMonth('created_at', 1)
    ->whereYear('created_at', $year)->count();

    $this->februari = Pengaduan::whereMonth('created_at', 2)
    ->whereYear('created_at', $year)->count();
    
    $this->maret = Pengaduan::whereMonth('created_at', 3)
    ->whereYear('created_at', $year)->count();
    
    $this->april = Pengaduan::whereMonth('created_at', 4)
    ->whereYear('created_at', $year)->count();
    
    $this->mei = Pengaduan::whereMonth('created_at', 5)
    ->whereYear('created_at', $year)->count();
    
    $this->juni = Pengaduan::whereMonth('created_at', 6)
    ->whereYear('created_at', $year)->count();
    
    $this->juli = Pengaduan::whereMonth('created_at', 7)
    ->whereYear('created_at', $year)->count();
    
    $this->agustus = Pengaduan::whereMonth('created_at', 8)
    ->whereYear('created_at', $year)->count();
    
    $this->september = Pengaduan::whereMonth('created_at', 9)
    ->whereYear('created_at', $year)->count();
    
    $this->oktober = Pengaduan::whereMonth('created_at', 10)
    ->whereYear('created_at', $year)->count();
    
    $this->november = Pengaduan::whereMonth('created_at', 11)
    ->whereYear('created_at', $year)->count();
    
    $this->desember = Pengaduan::whereMonth('created_at', 12)
    ->whereYear('created_at', $year)->count();
  }

  /**
  * Get the view / contents that represent the component.
  *
  * @return \Illuminate\View\View|string
  */
  public function render() {
    return view('components.card-home');
  }

}