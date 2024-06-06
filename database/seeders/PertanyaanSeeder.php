<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $pertanyaan = [
            [
                'id_murid' => 1,
                'pertanyaan' => '2*2(5+2) berapa?',
                'idmapel' => 1,
            ],
            [
                'id_murid' => 2,
                'pertanyaan' => 'Hitung energi kinetik dari sebuah benda yang memiliki massa 2 kg dan kecepatan 5 m/s!',
                'idmapel' => 2,
            ],
            [
                'id_murid' => 1,
                'pertanyaan' => 'Apakah nama normal dari CH4?',
                'idmapel' => 3,
            ],
            [
                'id_murid' => 4,
                'pertanyaan' => 'Badan terbuat dari apa?',
                'idmapel' => 4,
            ],
            [
                'id_murid' => 5,
                'pertanyaan' => '5+5 berapa?',
                'idmapel' => 1,
            ],
            [
                'id_murid' => 2,
                'pertanyaan' => 'Hitung kecepataan benda yang bergerak dengan jarak 100 m dan waktu tempuh 20 s!',
                'idmapel' => 2,
            ],
            [
                'id_murid' => 3,
                'pertanyaan' => 'jelaskan apa itu neutron',
                'idmapel' => 3,
            ],
            [
                'id_murid' => 4,
                'pertanyaan' => 'Manusia terbuat dari apa?',
                'idmapel' => 4,
            ],
        ];
        foreach ($pertanyaan as $value) {
            \App\Models\Pertanyaan::create($value);
        }
    }
}
