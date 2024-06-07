<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProfileNavigation extends Component
{
    public $loc;

    public function __construct($loc)
    {
        $this->loc = $loc;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.profile-navigation');
    }
}
