<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pasien extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $table='pasien';
    protected $fillable = [
     'id_user','nama','jk','no_hp','alamat','diagnosa'
    ];
}
