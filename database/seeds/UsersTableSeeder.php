<?php

use App\User;
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
      User::create([
        'name'=> 'nube123',
        'email'=> 'prueba1@gmail.com',
        'username'=> 'admin123',
        'password'=> bcrypt('123456'),
        'image'=>'user.svg',
      ]);
    }
}
