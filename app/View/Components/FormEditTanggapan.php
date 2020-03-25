<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormEditTanggapan extends Component
{
	public $tanggapan;
	
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tanggapan)
    {
        $this->tanggapan = $tanggapan;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form-edit-tanggapan');
    }
}
