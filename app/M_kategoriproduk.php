<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_kategoriproduk extends Model
{
    protected $fillable = ['nama'];
    
    public function m_produks()
    {
        return $this->hasMany('App\M_produk')->orderBy('id','asc');
    }
}