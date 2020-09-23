<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForwardChaining extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $table = 'fc_rules';
	protected $guarded = ['id'];
	// protected $fillable = [
	// 	'penyakit','G1','G2','G3','G4','G5','G6','G7','G8','G9','G10','G11','G12','G13','G14','G15','G16','G17','G18','G19','G20','G21','G22','G23','G24','G25','G26','G27','G28','G29','G30','G31','G32','G33','G34','G35','G36','G37','G38','G39','G40','G41','G42','G43','G44','G45','G46','G47','G48'
	// ];
}
