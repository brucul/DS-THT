<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateRuleP7 extends Seeder
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
	        	'G5'=>1,
	        	'G7'=>1,
	        	'G14'=>1,
	        	'G21'=>1,
	        	'G28'=>1,
	        	'G30'=>1,
	        	'G32'=>1,
	        	'G44'=>1,
	        	'G45'=>1,
        	]
        ];
    	
        DB::table('fc_rules')->where('penyakit', 'P7')->update([
				'G2'=>1,
	        	'G5'=>1,
	        	'G7'=>1,
	        	'G14'=>1,
	        	'G21'=>1,
	        	'G28'=>1,
	        	'G30'=>1,
	        	'G32'=>1,
	        	'G44'=>1,
	        	'G45'=>1,
        	]);
    }
}
