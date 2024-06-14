<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BookCard extends Component
{
    public $id;
    public $photo;
    public $judul_buku;

    public function __construct($id, $photo, $judul_buku)
    {
        $this->id = $id;
        $this->photo = $photo;
        $this->judul_buku = $judul_buku;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.book-card');
    }
}
