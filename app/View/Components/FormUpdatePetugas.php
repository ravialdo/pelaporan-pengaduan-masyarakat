<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormUpdatePetugas extends Component
{
   public $id;
   public $nama;
   public $username;
   public $telepon;
   public $level;
   
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $nama, $username, $telepon, $level)
    {
        $this->id = $id;
        $this->nama = $nama;
        $this->username = $username;
        $this->telepon = $telepon;
        $this->level = $level;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form-update-petugas');
    }
}
