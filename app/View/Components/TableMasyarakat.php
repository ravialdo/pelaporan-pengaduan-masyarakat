<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TableMasyarakat extends Component
{
    public $q;
   
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($q)
    {
        $this->q = $q;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.table-masyarakat');
    }
}
