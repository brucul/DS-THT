<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateRuleP4 extends Seeder
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
				'G3'=>1,
	        	'G7'=>1,
	        	'G15'=>1,
	        	'G16'=>1,
	        	'G27'=>1,
	        	'G33'=>1,
	        	'G35'=>1,
	        	'G39'=>1,
	        	'G40'=>1,
	        	'G41'=>1,
        	]
        ];
    	
        DB::table('fc_rules')->where('penyakit', 'P4')->update([
                'G3'=>1,
                'G7'=>1,
                'G15'=>1,
                'G16'=>1,
                'G27'=>1,
                'G33'=>1,
                'G35'=>1,
                'G39'=>1,
                'G40'=>1,
                'G41'=>1,
            ]);
    }
}
