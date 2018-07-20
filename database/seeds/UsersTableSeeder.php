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
        DB::table('users')->insert(array(
            [
                'name'      => 'Achmad Kafin',
                'username'  => 'admin',
                'password'  => bcrypt('secret'),
                'level'     => 1,
                'remember_token' => str_random(10),
            ],
            [
              'name'      => 'Dian Santika',
              'username'  => 'admin2',
              'password'  => bcrypt('secret'),
              'level'     => 2,
              'remember_token' => str_random(10),
            ]
        ));
    }
}
