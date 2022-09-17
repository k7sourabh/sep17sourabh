<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class Admin_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'Admin@gmail.com',
            'password' => bcrypt('123456')
        ]);
    }
}
