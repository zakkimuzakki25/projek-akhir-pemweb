<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    public $searchKey;

    public function __construct($searchKey = null)
    {
        $this->searchKey = $searchKey;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.navbar');
    }
}
