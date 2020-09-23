<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateRuleP2 extends Seeder
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
				'G7'=>1,
	        	'G9'=>1,
	        	'G10'=>1,
	        	'G15'=>1,
	        	'G18'=>1,
	        	'G19'=>1,
	        	'G20'=>1,
	        	'G28'=>1,
	        	'G30'=>1,
	        	'G31'=>1,
	        	'G34'=>1,
	        	'G38'=>1,
        	]
        ];
        DB::table('fc_rules')->where('penyakit', 'P2')->update([
                'G7'=>1,
                'G9'=>1,
                'G10'=>1,
                'G15'=>1,
                'G18'=>1,
                'G19'=>1,
                'G20'=>1,
                'G28'=>1,
                'G30'=>1,
                'G31'=>1,
                'G34'=>1,
                'G38'=>1,
            ]);
    }
}
