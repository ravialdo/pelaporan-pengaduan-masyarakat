<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TablePengaduan extends Component
{
    public $q;
    public $pengaduan;
   
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($q, $pengaduan)
    {
        $this->q = $q;
        $this->pengaduan = $pengaduan;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.table-pengaduan');
    }
}
