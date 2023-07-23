<?php

namespace Database\Seeders;

use App\Models\KategoriBerita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriBeritaSeeder extends Seeder
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
                'nama_kategori' => 'Olahraga'
            ],
            [
                'nama_kategori' => 'Berita Media',
            ],
            [
                'nama_kategori' => 'Edukasi & Tips'
            ]
        ])->each(function ($kategoriBerita) {
            KategoriBerita::create($kategoriBerita);
        });
    }
}
