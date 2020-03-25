<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FromUpdateMasyarakat extends Component
{
   
   public $id;
   public $nik;
   public $nama;
   public $username;
   public $telepon;
   
   
    /**
     * Create a new component instance.
     *
     * @return void
     */
   
    public function __construct($id, $nik, $nama, $username, $telepon)
    {
        $this->id = $id;
        $this->nik = $nik;
        $this->nama = $nama;
        $this->username = $username;
        $this->telepon = $telepon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.from-update-masyarakat');
    }
}
