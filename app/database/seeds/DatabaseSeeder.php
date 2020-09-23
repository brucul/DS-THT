<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(GejalaTableSeeder::class);
        $this->call(PenyakitTableSeeder::class);
        $this->call(DSRulesTableSeeder::class);
        $this->call(UpdateRuleP1::class);
        $this->call(UpdateRuleP2::class);
        $this->call(UpdateRuleP3::class);
        $this->call(UpdateRuleP4::class);
        $this->call(UpdateRuleP5::class);
        $this->call(UpdateRuleP6::class);
        $this->call(UpdateRuleP7::class);
        $this->call(UpdateRuleP8::class);
        $this->call(UpdateRuleP9::class);
    }
}
