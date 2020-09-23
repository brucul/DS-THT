<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateRuleP5 extends Seeder
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
				'G5'=>1,
	        	'G7'=>1,
	        	'G12'=>1,
	        	'G14'=>1,
	        	'G15'=>1,
	        	'G17'=>1,
	        	'G26'=>1,
	        	'G27'=>1,
	        	'G33'=>1,
	        	'G40'=>1,
	        	'G41'=>1,
        	]
        ];
    	
        DB::table('fc_rules')->where('penyakit', 'P5')->update([
                'G5'=>1,
                'G7'=>1,
                'G12'=>1,
                'G14'=>1,
                'G15'=>1,
                'G17'=>1,
                'G26'=>1,
                'G27'=>1,
                'G33'=>1,
                'G40'=>1,
                'G41'=>1,
            ]);
    }
}
