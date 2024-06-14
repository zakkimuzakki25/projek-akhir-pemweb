<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Http\Request;

class Navbar extends Component
{
    public $searchKey;

    public function __construct(Request $request)
    {
        $this->searchKey = $request->query('key', null);
    }
    
    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.navbar');
    }
}
