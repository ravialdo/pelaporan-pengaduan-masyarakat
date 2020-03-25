<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
   
   public $pengaduan;
   public $validasi;
   public $tolak;
   public $q;
   
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($pengaduan, $validasi, $q, $tolak)
    {
        $this->pengaduan = $pengaduan;
        $this->validasi = $validasi;
	   $this->tolak = $tolak;
        $this->q = $q;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.card');
    }
}
