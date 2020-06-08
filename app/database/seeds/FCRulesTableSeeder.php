<?php

use Illuminate\Database\Seeder;

class FCRulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fc_rules=[
        	['penyakit'=>'P1',
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
        	],
        	['penyakit'=>'P2',
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
        	],
        	['penyakit'=>'P3',
        		'G2'=>1,
	        	'G5'=>1,
	        	'G12'=>1,
	        	'G13'=>1,
	        	'G14'=>1,
	        	'G24'=>1,
	        	'G25'=>1,
	        	'G41'=>1,
	        	'G46'=>1,
        	],
        	['penyakit'=>'P4',
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
        	],
        	['penyakit'=>'P5',
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
        	],
        	['penyakit'=>'P6',
        		'G8'=>1,
	        	'G15'=>1,
	        	'G22'=>1,
	        	'G29'=>1,
	        	'G37'=>1,
	        	'G39'=>1,
	        	'G41'=>1,
	        	'G47'=>1,
	        	'G48'=>1,
        	],
        	['penyakit'=>'P7',
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
        	],
        	['penyakit'=>'P8',
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
        	],
        	['penyakit'=>'P9',
        		'G2'=>1,
	        	'G7'=>1,
	        	'G33'=>1,
	        	'G36'=>1,
	        	'G39'=>1,
	        	'G42'=>1,
	        	'G43'=>1,
	        	'G46'=>1,
        	],
        ];
        DB::table('fc_rules')->insert($fc_rules);
    }
}