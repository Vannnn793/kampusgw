<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    public function run()
    {
        Profile::updateOrCreate(
            ['id' => 1], // Cek apakah ID 1 ada?
            [
                // Default value data awal
                // 'nama_kampus'     => 'Universitas Teknologi Masa Depan',
                'nama_rektor'     => 'Dr. Rektor Belum Diisi',
                'sambutan_rektor' => '<p>Sambutan rektor belum diisi. Silakan edit di halaman admin.</p>',
                'sejarah_kampus'  => '<p>Sejarah kampus belum diisi.</p>',
                'visi'            => '<p>Menjadi kampus unggulan.</p>',
                'misi'            => '<ul><li>Misi pertama</li><li>Misi kedua</li></ul>',
                // 'alamat'          => 'Jl. Contoh No. 123, Jakarta',
                // 'email'           => 'info@kampus.ac.id',
                // 'telepon'         => '021-12345678',
                // Logo & Foto biarkan null dulu atau kasih path placeholder
                'logo_path'       => null, 
                'foto_rektor'     => null,
            ]
        );
    }
}