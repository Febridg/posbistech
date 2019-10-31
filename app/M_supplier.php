<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_supplier extends Model
{
    protected $fillable = ['nama','alamat','no_tlp','email','keterangan'];
}
