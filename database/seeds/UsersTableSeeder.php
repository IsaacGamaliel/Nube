<?php

use Illuminate\Database\Seeder;
use App\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=> 'Isaac Gamaliel',
            'email'=> 'prueba1@gmail.com',
            'username'=> 'isaac123',
            'password'=> bcrypt('123456'),
            'image'=>'user.svg',
        ]);
    }
}
