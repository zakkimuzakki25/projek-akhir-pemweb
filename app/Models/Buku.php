<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'bukus';

    public function jenisBuku()
    {
        return $this->belongsToMany(JenisBuku::class, 'jenis_buku_bukus', 'id_buku', 'id_jenis_buku');
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorits', 'id_buku', 'id_pengguna')->withTimestamps();
    }

    public function usersWithCart()
    {
        return $this->belongsToMany(User::class, 'keranjangs', 'id_buku', 'id_pengguna')
                    ->withTimestamps();
    }
}
