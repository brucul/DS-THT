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
            'name' => 'Afriza Fadilah',
            'email' => 'afrizaf3@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('425425af'),
            'is_admin' => 1,
            // 'is_active' => 1,
            'tgl_lahir' => '1998-04-14',
            'jk' => 'Laki-laki',
            'no_hp' => '085741336588',
            'alamat' => 'Tegal',
        ]);
    }
}
