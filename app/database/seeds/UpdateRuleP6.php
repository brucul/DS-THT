<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateRuleP6 extends Seeder
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
				'G8'=>1,
	        	'G15'=>1,
	        	'G22'=>1,
	        	'G29'=>1,
	        	'G37'=>1,
	        	'G39'=>1,
	        	'G41'=>1,
	        	'G47'=>1,
	        	'G48'=>1,
        	]
        ];
    	
        DB::table('fc_rules')->where('penyakit', 'P6')->update([
				'G8'=>1,
	        	'G15'=>1,
	        	'G22'=>1,
	        	'G29'=>1,
	        	'G37'=>1,
	        	'G39'=>1,
	        	'G41'=>1,
	        	'G47'=>1,
	        	'G48'=>1,
        	]);
    }
}
