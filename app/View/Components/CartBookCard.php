<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CartBookCard extends Component
{
    public $id;
    public $photo;
    public $judul_buku;
    public $sinopsis;

    public function __construct($id, $photo, $judul_buku, $sinopsis)
    {
        $this->id = $id;
        $this->photo = $photo;
        $this->judul_buku = $judul_buku;
        $this->sinopsis = $sinopsis;
    }

    public function render()
    {
        return view('components.cart-book-card');
    }
}
