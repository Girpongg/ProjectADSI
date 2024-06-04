<?php

namespace Database\Seeders;

use App\Models\Angkatan;
use App\Models\TahunAngkatan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AngkatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [['tahun_angkatan' => 'X'], ['tahun_angkatan' => 'XI'], ['tahun_angkatan' => 'XII']];

        foreach ($data as $d) {
            TahunAngkatan::create($d);
        }
    }
}
