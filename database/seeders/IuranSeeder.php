<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IuranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $iuran = [
            ['murid_id' => 1, 'tanggal' => '2024-06-05', 'nominal' => 150000],
            ['murid_id' => 2, 'tanggal' => '2024-06-05', 'nominal' => 150000],
            ['murid_id' => 3, 'tanggal' => '2024-06-05', 'nominal' => 150000],
            ['murid_id' => 4, 'tanggal' => '2024-06-05', 'nominal' => 150000],
            ['murid_id' => 5, 'tanggal' => '2024-06-05', 'nominal' => 150000],
            ['murid_id' => 6, 'tanggal' => '2024-06-05', 'nominal' => 150000],
            ['murid_id' => 7, 'tanggal' => '2024-06-05', 'nominal' => 150000],
            ['murid_id' => 8, 'tanggal' => '2024-06-05', 'nominal' => 150000],
            ['murid_id' => 9, 'tanggal' => '2024-06-05', 'nominal' => 150000],
            ['murid_id' => 10, 'tanggal' => '2024-06-05', 'nominal' => 150000],
            ['murid_id' => 11, 'tanggal' => '2024-06-05', 'nominal' => 150000],
            ['murid_id' => 12, 'tanggal' => '2024-06-05', 'nominal' => 150000],
            ['murid_id' => 13, 'tanggal' => '2024-06-05', 'nominal' => 150000],
            ['murid_id' => 14, 'tanggal' => '2024-06-05', 'nominal' => 150000],
            ['murid_id' => 15, 'tanggal' => '2024-06-05', 'nominal' => 150000],
        ];

        foreach ($iuran as $i) {
            \App\Models\Iuran::create($i);
        }
    }
}
