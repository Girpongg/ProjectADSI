<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuangKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $ruang =[
            [
                "nama" => "Ruang 1",
                "kapasitas" => 30
            ],
            [
                "nama" => "Ruang 2",
                "kapasitas" => 25
            ],
            [
                "nama" => "Ruang 3",
                "kapasitas" => 20
            ],
            [
                "nama" => "Ruang 4",
                "kapasitas" => 15
            ]
        ];

        foreach ($ruang as $r) {
            \App\Models\RuangKelas::create($r);
        }
    }
}
