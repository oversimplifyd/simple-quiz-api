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
        DB::table('users')->insert([
            'first_name' => 'testing',
            'last_name' => 'ok',
            'email' =>'test@gmail.com',
            'password' => bcrypt('secret'),
            'user_type' => '1'
        ]);
    }
}
