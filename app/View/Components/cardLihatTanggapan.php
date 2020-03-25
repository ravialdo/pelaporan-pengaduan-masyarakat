<?php

namespace App\View\Components;

use Illuminate\View\Component;

class cardLihatTanggapan extends Component
{
	public $pengaduan;
	public $tanggapan;
	
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($pengaduan, $tanggapan)
    {
        $this->pengaduan = $pengaduan;
	   $this->tanggapan = $tanggapan;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.card-lihat-tanggapan');
    }
}
