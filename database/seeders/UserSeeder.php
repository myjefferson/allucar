<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jefferson Carvalho',
            'email' => 'jcsjeffrey@gmail.com',
            'email_verified_at' => date("Y-m-d"),
            'password' => bcrypt('12345678')
        ]);
    }
}
