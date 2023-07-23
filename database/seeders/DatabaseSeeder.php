<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\KategoriWisata;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            KategoriBeritaSeeder::class,
            UserSeeder::class,
            KategoriEventSeeder::class,
            KategoriWisataSeeder::class,
            PengaturanSeeder::class,
        ]);
    }
}
