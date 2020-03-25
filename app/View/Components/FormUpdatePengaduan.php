<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormUpdatePengaduan extends Component
{
   
   public $pengaduan;
   
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($pengaduan)
    {
        $this->pengaduan = $pengaduan;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form-update-pengaduan');
    }
}
