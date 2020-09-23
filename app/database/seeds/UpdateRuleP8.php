<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateRuleP8 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fc_rules=[
        	[
				'G1'=>1,
	        	'G2'=>1,
	        	'G3'=>1,
	        	'G21'=>1,
	        	'G22'=>1,
	        	'G23'=>1,
	        	'G28'=>1,
	        	'G33'=>1,
	        	'G36'=>1,
	        	'G39'=>1,
	        	'G42'=>1,
	        	'G44'=>1,
        	]
        ];
    	
        DB::table('fc_rules')->where('penyakit', 'P8')->update([
				'G1'=>1,
	        	'G2'=>1,
	        	'G3'=>1,
	        	'G21'=>1,
	        	'G22'=>1,
	        	'G23'=>1,
	        	'G28'=>1,
	        	'G33'=>1,
	        	'G36'=>1,
	        	'G39'=>1,
	        	'G42'=>1,
	        	'G44'=>1,
        	]);
    }
}
