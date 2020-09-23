<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateRuleP1 extends Seeder
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
				'G4'=> 1,
				'G6'=> 1,
				'G7'=> 1,
				'G11'=> 1,
				'G19'=> 1,
				'G20'=> 1,
				'G33'=> 1,
				'G34'=> 1,
				'G36'=> 1,
				'G38'=> 1,
        	]
        ];
        DB::table('fc_rules')->where('penyakit', 'P1')->update([
                'G4'=> 1,
                'G6'=> 1,
                'G7'=> 1,
                'G11'=> 1,
                'G19'=> 1,
                'G20'=> 1,
                'G33'=> 1,
                'G34'=> 1,
                'G36'=> 1,
                'G38'=> 1,
            ]);
    }
}
