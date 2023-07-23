<?php

namespace Database\Seeders;

use App\Models\KategoriEvent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriEventSeeder extends Seeder
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
                'nama_kategori' => 'Ekonomi Kreatif'
            ],
            [
                'nama_kategori' => 'Budaya'
            ],
            [
                'nama_kategori' => 'Event'
            ],
            [
                'nama_kategori' => 'Olahraga'
            ]
        ])->each(function ($kategori) {
            KategoriEvent::create($kategori);
        });
    }
}
