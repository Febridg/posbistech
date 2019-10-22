<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_produk extends Model
{
    public function m_kategoriproduks()
    {
        return $this->belongsTo('App\M_kategoriproduks','m_kategoriproduk_id');
    }
}