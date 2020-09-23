<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateRuleP3 extends Seeder
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
	        	'G12'=>1,
	        	'G13'=>1,
	        	'G14'=>1,
	        	'G24'=>1,
	        	'G25'=>1,
	        	'G41'=>1,
	        	'G46'=>1,
        	]
        ];
    	
        DB::table('fc_rules')->where('penyakit', 'P3')->update([
                'G2'=>1,
                'G5'=>1,
                'G12'=>1,
                'G13'=>1,
                'G14'=>1,
                'G24'=>1,
                'G25'=>1,
                'G41'=>1,
                'G46'=>1,
            ]);
    }
}
