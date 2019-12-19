<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_produk extends Model
{
    protected $fillable = ['m_user_id','nama','nomer','tag','deskripsi','m_kategoriproduk_id','harga','stock','promo','gambar_satu','gambar_dua','gambar_tiga','aktif'];

    public function m_kategoriproduks()
    {
        return $this->belongsTo('App\M_kategoriproduk','m_kategoriproduk_id');
    }
}