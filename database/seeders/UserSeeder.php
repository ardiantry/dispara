<?php

namespace Database\Seeders;

use App\Models\BukuTamu;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Admininstrator',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
                'role' => '1',
                'email_verified_at' => now()
            ],
            [
                'name' => 'iqbal',
                'email' => 'iqbal@gmail.com',
                'password' => bcrypt('iqbal'),
                'role' => '2',
                'email_verified_at' => now()
            ]
        ];

        foreach ($data as $d) {
            User::create($d);
        }

        $idUser = User::query()
            ->where('email', '=', 'iqbal@gmail.com')
            ->first();

        BukuTamu::create([
            'user_id' => $idUser['id'],
            'pelindung' => 'Politeknik Negeri Indramayu',
            'no_hp' => '0888888888888',
            'alamat' => 'Bangkir',
        ]);
    }
}
