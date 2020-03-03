<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penyakit extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $table='penyakit';
    protected $fillable = [
     'penyakit','jenis','kode_penyakit',
    ];
}
