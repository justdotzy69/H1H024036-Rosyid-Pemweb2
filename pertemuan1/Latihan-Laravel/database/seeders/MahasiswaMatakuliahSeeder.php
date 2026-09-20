<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;

class MahasiswaMatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $mahasiswa = Mahasiswa::all();
    $matakuliah = Matakuliah::all();

    foreach ($mahasiswa as $mhs) {
        $pilihan = $matakuliah->random(rand(3, 5));
    foreach ($pilihan as $mk) {
        $mhs->matakuliah()->attach($mk->id, [
            'nilai' => rand(60, 100),
            ]);
        }
    }
    }
}
