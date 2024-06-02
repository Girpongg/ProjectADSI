<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $guru =[
            [
                "nama" => "Budi",
            ],
            [
                "nama" => "Agus",
            ],
            [
                "nama" => "Susi",
            ],
            [
                "nama" => "Rina",
            ]
        ];

        foreach ($guru as $g) {
            \App\Models\Guru::create($g);
        }
    }
}
