<?php

namespace Database\Seeders;

use App\Models\KategoriWisata;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriWisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'nama_kategori' => 'Wisata Alam'
            ],
            [
                'nama_kategori' => 'Wisata buatan',
            ],
            [
                'nama_kategori' => 'Wisata Kuliner'
            ],
            [
                'nama_kategori' => 'Wisata Sejarah'
            ],
            [
                'nama_kategori' => 'Wisata Edukasi'
            ],
        ])->each(function ($kategoriBerita) {
            KategoriWisata::create($kategoriBerita);
        });
    }
}
