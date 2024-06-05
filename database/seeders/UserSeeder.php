<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user =[
            [
                "name" => "Admin",
                "email" => "admin@gmail.com",
                "password" => "admin123",
            ]];
        foreach ($user as $u) {
            \App\Models\User::create($u);
        };
    }
}
