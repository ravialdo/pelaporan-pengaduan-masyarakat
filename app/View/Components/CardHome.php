<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Masyarakat;
use App\Petugas;
use App\Pengaduan;

class CardHome extends Component
{
	public $masyarakat;
	public $petugas;
	public $admin;
	public $pengaduan;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->masyarakat = Masyarakat::all()->count();
        $this->petugas = Petugas::where('level', 'petugas')->count();
	   $this->admin = Petugas::where('level', 'admin')->count();
	   $this->pengaduan = Petugas::all()->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.card-home');
    }

}
