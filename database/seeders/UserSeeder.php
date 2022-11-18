<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $users = array(
            array(
                'name' => 'Super Admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('123456'),
                'role' => '1'
            ),
            array(
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => bcrypt('123456'),
                'role' => '0'
            ),
            array(
                'name' => 'director',
                'email' => 'director@gmail.com',
                'password' => bcrypt('123456'),
                'role' => '2'
            ),
        );
        User::insert($users); 
    }
}
