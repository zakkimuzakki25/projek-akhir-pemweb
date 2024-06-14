<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BorrowBookCard extends Component
{
    public $id;
    public $photo;
    public $title;

    public function __construct($id, $photo, $title)
    {
        $this->id = $id;
        $this->photo = $photo;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.borrow-book-card');
    }
}
