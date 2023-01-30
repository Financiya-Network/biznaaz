<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'first_name' => str_random(10),
            'email_address' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
