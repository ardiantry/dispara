<?php

namespace Database\Seeders;

use App\Models\Pengaturan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengaturanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array([
            [
                'nama_web' => 'Dinas Pariwisata Kepemudaan Dan Olahraga Kabupaten Indramayu',
                'email_web' => 'disbudparindramayu@gmail.com',
                'kontak' => '(0234) 272325',
                'alamat' => 'Jl. Gatot Subroto No.4, Karanganyar, Kec. Indramayu, Kabupaten Indramayu, Jawa Barat 45213',
                'deskripsi_web' => 'Dinas Pariwisata Kepemudaan Dan Olahraga merupakan badan lembaga daerah yang berada di Kabupaten Indramayu Provinsi Jawa Barat',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        foreach ($data as $d) {
            DB::table('pengaturans')->insert($d);
        }
    }
}
