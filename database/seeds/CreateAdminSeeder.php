<?php

use Illuminate\Database\Seeder;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'adminadmin@gmail.com',
            'password' => bcrypt('secret'),
            'role' => 2,
        ]);
    }
}
