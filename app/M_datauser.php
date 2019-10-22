<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_datauser extends Model
{
    public function m_users()
    {
        return $this->belongsTo('App\M_user','m_user_id');
    }
}