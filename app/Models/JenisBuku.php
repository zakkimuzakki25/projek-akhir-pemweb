<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisBuku extends Model
{
    protected $table = 'jenis_bukus';

    public function bukus()
    {
        return $this->belongsToMany(Buku::class, 'jenis_buku_bukus', 'id_jenis_buku', 'id_buku');
    }
}
