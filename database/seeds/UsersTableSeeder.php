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
        App\User::create([
            'name'=>'Abd-Elrahman Mohamed',
            'email'=>'el_rahmanii@outlook.com',
            'password'=>bcrypt('password')


        ]);
    }
}
