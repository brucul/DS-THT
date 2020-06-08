<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rule extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $table = 'ds_rules';
	protected $fillable = [
		'id_gejala',
		'id_penyakit', 
		'bobot'
	];
}
