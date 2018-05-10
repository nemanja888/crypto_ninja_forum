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
            'name' => 'admin',
            'password' => bcrypt('admin'),
            'email' => 'admin@mail.com',
            'admin' => 1,
            'avatar' => asset('avatars/avatar.png')
        ]);

        App\User::create([

            'name' => "Marko Markovic",
            'password' => bcrypt('123qwe'),
            'email' => 'ma@mail.com',
            'avatar' => asset('avatars/avatar.png')

        ]);
    }
}
