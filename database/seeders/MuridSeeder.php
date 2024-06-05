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
                "id_angkatan" => 1,
                "status" => "1"
            ],
            [
                "nama" => "Girvan Witartha",
                "alamat" => "Jl. Raya No. 2",
                "id_angkatan" => 2,
                "status" => "1",
            ],
            [
                "nama" => "Tania Jessica",
                "alamat" => "Jl. Raya No. 3",
                "id_angkatan" => 3,
                "status" => "1",
            ],
            [
                "nama" => "Michael Sibarani",
                "alamat" => "Jl. Raya No. 4",
                "id_angkatan" => 1,
                "status" => "1",
            ],
            [
                "nama" => "Rizky Ramadhan",
                "alamat" => "Jl. Raya No. 5",
                "id_angkatan" => 2,
                "status" => "0",
            ],
            [
                "nama" => "Grizel Witartha",
                "alamat" => "Jl. Raya No. 6",
                "id_angkatan" => 3,
                "status" => "1",
            ],
            [
                "nama" => "Bambang Sutrisno",
                "alamat" => "Jl. Raya No. 7",
                "id_angkatan" => 1,
                "status" => "0",
            ],
            [
                "nama" => "Christian Wijaya",
                "alamat" => "Jl. Raya No. 8",
                "id_angkatan" => 2,
                "status" => "0",
            ],
            [
                "nama" => "Christopher Wijaya",
                "alamat" => "Jl. Raya No. 9",
                "id_angkatan" => 3,
                "status" => "1",
            ],
            [
                "nama" => "Charles Wijaya",
                "alamat" => "Jl. Raya No. 10",
                "id_angkatan" => 1,
                "status" => "1",
            ],
            [
                "nama" => "MArvino Aji",
                "alamat" => "Jl. Raya No. 11",
                "id_angkatan" => 2,
                "status" => "0",
            ],
            [
                "nama" => "Jessica Bunga",
                "alamat" => "Jl. Raya No. 12",
                "id_angkatan" => 3,
                "status" => "1",
            ],
            [
                "nama" => "Jesselyn Kyril",
                "alamat" => "Jl. Raya No. 13",
                "id_angkatan" => 1,
                "status" => "1",
            ],
            [
                "nama" => "Eselon Reeve",
                "alamat" => "Jl. Raya No. 14",
                "id_angkatan" => 2,
                "status" => "1",
            ],
            [
                "nama" => "Brandon Kuwara",
                "alamat" => "Jl. Raya No. 15",
                "id_angkatan" => 3,
                "status" => "1",
            ],
        ];
        foreach ($murid as $m) {
            \App\Models\Murid::create($m);
        }
    }
}
