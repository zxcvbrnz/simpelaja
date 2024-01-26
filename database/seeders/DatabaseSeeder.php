<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'Admin Puskesmas',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin'
        ]);
        \App\Models\User::create([
            'name' => 'Puskesmas Saka',
            'email' => 'saka@gmail.com',
            'password' => bcrypt('saka1234'),
            'role' => 'puskesmas'
        ]);
        \App\Models\ukm::create([
            'program' => 'Kia KB Lansia',
        ]);
        \App\Models\ukm::create([
            'program' => 'Gizi',
        ]);
        \App\Models\ukm::create([
            'program' => 'Kesling',
        ]);
        \App\Models\ukm::create([
            'program' => 'Promkes dan Pemberdayaan Masyarakat',
        ]);
        \App\Models\ukm::create([
            'program' => 'Pencegahan dan Pengendalian Penyakit',
        ]);
        \App\Models\ukm::create([
            'program' => 'Kesehatan tradisional',
        ]);

        \App\Models\subprogram::create([
            'id_ukm' => 1,
            'nama' => 'Cakupan K1',
            'str_pembilang' => 'Jml.Ibu hamil kunjungan pertama',
            'str_penyebut' => 'Sasaran Ibu Hamil 1 Tahun',
            'kali' => 100,
            'target' => 95,
            'str_target' => '%',
            'satuan' => '0',
            'type' => 1,
        ]);
    }
}
