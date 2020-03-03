<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gejala extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $table='gejala';
    protected $fillable = [
    	'gejala','jenis','kode_gejala'
    ];
}
