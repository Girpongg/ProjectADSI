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
                'pertanyaan' => 'Apakah benar bahwa PHP adalah bahasa pemrograman terbaik?',
                'idmapel' => 1,
            ],
            [
                'id_murid' => 2,
                'pertanyaan' => 'Apakah benar bahwa PHP adalah bahasa pemrograman terbaik?',
                'idmapel' => 2,
            ],
            [
                'id_murid' => 1,
                'pertanyaan' => 'Apakah benar bahwa PHP adalah bahasa pemrograman terbaik?',
                'idmapel' => 3,
            ],
            [
                'id_murid' => 4,
                'pertanyaan' => 'Apakah benar bahwa PHP adalah bahasa pemrograman terbaik?',
                'idmapel' => 4,
            ],
            [
                'id_murid' => 5,
                'pertanyaan' => 'Apakah benar bahwa PHP adalah bahasa pemrograman terbaik?',
                'idmapel' => 1,
            ],
            [
                'id_murid' => 2,
                'pertanyaan' => 'Apakah benar bahwa PHP adalah bahasa pemrograman terbaik?',
                'idmapel' => 2,
            ],
            [
                'id_murid' => 3,
                'pertanyaan' => 'Apakah benar bahwa PHP adalah bahasa pemrograman terbaik?',
                'jawaban' => 'Tidak, PHP bukan bahasa pemrograman terbaik.',
                'idmapel' => 3,
            ],
            [
                'id_murid' => 4,
                'pertanyaan' => 'Apakah benar bahwa PHP adalah bahasa pemrograman terbaik?',
                'idmapel' => 4,
            ],
        ];
        foreach ($pertanyaan as $value) {
            \App\Models\Pertanyaan::create($value);
        }
    }
}
