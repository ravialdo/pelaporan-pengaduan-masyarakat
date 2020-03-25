<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardRiwayat extends Component
{
	public $pengaduan;
	public $q;
	
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($pengaduan, $q)
    {
        $this->pengaduan = $pengaduan;
	   $this->q = $q;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.card-riwayat');
    }
}
