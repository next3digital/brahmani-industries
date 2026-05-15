<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'              => 1,
                'name'            => 'nishasalian',
                'email'           => 'nisha.salian1@gmail.com',
                'password'        => bcrypt('SJS93#(T&*chw393-989!'),
                'remember_token'  => null,
                'two_factor_code' => '',
            ],
        ];

        User::insert($users);
    }
}
