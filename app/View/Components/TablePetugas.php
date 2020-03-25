<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Petugas;

class TablePetugas extends Component
{
     public $q;
     public $petugas;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($q, $petugas)
    {
        $this->q = $q;
        $this->petugas = $petugas;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.table-petugas');
    }
   
}
