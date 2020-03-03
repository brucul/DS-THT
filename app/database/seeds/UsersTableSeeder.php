<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'BrucuL',
            'email' => 'afrizaf3@gmail.com',
            'password' => Hash::make('425425af'),
            'is_admin' => 1,
        ]);
    }
}
