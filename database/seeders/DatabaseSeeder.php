<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
        /**
         * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(MataPelajaranSeeder::class);
        $this->call(RuangKelasSeeder::class);
        $this->call(GuruSeeder::class);
        $this->call(AngkatanSeeder::class);
        $this->call(MuridSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PertanyaanSeeder::class);
        // $this->call(MataPelajaranSeeder::class);
        // $this->call(RuangKelasSeeder::class);
        // $this->call(GuruSeeder::class);
        // $this->call(AngkatanSeeder::class);
        // $this->call(MuridSeeder::class);
        // $this->call(UserSeeder::class);
        // $this->call(PertanyaanSeeder::class);
        $this->call(IuranSeeder::class);
    }
}
