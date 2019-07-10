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
        $user = App\User::create([
            'name'=>'Abd-Elrahman Mohamed',
            'email'=>'el_rahmanii@outlook.com',
            'password'=>bcrypt('password'),
            'admin'=>1


        ]);
        App\Profile::create([

          'user_id'=>$user->id,
          'avatar'=>'uploads/avatars/1.jpg',
          'about'=>'kfdjgklfdjgklfdjgklfdgkjgklfdjgklajlgkjakjgadjgakdjgkadjgkjdklsjdag',
          'facebook'=>'facebok.com',



        ]);
    }
}
