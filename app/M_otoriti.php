<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_otoriti extends Model
{
    protected $fillable = ['m_modul_id','nama'];

    public function m_moduls()
    {
        return $this->belongsTo('App\M_modul','m_modul_id');
    }

    public function m_detailotoritis()
    {
        return $this->hasMany('App\M_detailotoriti');
    }

    public function m_users()
    {
        return $this->hasMany('App\M_user');
    }
}