<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateRuleP9 extends Seeder
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
				'G2'=>1,
	        	'G7'=>1,
	        	'G33'=>1,
	        	'G36'=>1,
	        	'G39'=>1,
	        	'G42'=>1,
	        	'G43'=>1,
	        	'G46'=>1,
        	]
        ];
    	
        DB::table('fc_rules')->where('penyakit', 'P9')->update([
				'G2'=>1,
	        	'G7'=>1,
	        	'G33'=>1,
	        	'G36'=>1,
	        	'G39'=>1,
	        	'G42'=>1,
	        	'G43'=>1,
	        	'G46'=>1,
        	]);
    }
}
