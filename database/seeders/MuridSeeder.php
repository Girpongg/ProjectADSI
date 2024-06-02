<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MuridSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $murid =[
            [
                "nama" => "Valiant GIlchrist",
                "alamat" => "Jl. Raya No. 1",
                "id_angkatan" => 1
            ],
            [
                "nama" => "Girvan Witartha",
                "alamat" => "Jl. Raya No. 2",
                "id_angkatan" => 2
            ],
            [
                "nama" => "Tania Jessica",
                "alamat" => "Jl. Raya No. 3",
                "id_angkatan" => 3
            ],
            [
                "nama" => "Michael Sibarani",
                "alamat" => "Jl. Raya No. 4",
                "id_angkatan" => 1
            ]
        ];
        foreach ($murid as $m) {
            \App\Models\Murid::create($m);
        }
    }
}
