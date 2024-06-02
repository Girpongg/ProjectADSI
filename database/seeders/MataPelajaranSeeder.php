<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MataPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $matkul =[
            [
                "nama" => "Matematika"
            ],
            [
                "nama" => "Fisika"
            ],
            [
                "nama" => "Kimia"
            ],
            [
                "nama" => "Biologi"
            ]
        ];

        foreach ($matkul as $m) {
            \App\Models\MataPelajaran::create($m);
        }
    }
}
