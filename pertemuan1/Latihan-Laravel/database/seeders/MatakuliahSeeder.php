<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Matakuliah;

class MatakuliahSeeder extends Seeder
{
      public function run(): void
    {
        $daftar = [
            ['kode' => 'TK245001', 'nama' => 'Sistem Kendali',              'sks' => 3, 'semester' => 5],
            ['kode' => 'TK245002', 'nama' => 'Keamanan Jaringan Komputer',  'sks' => 2, 'semester' => 6],
            ['kode' => 'TK245004', 'nama' => 'Internet of Things',          'sks' => 3, 'semester' => 6],
            ['kode' => 'TK245006', 'nama' => 'Etika Profesi',               'sks' => 2, 'semester' => 7],
            ['kode' => 'TK245009', 'nama' => 'Pemrograman Web II',          'sks' => 2, 'semester' => 4],
        ];
        foreach ($daftar as $item) {
            Matakuliah::create($item);
        }
    }

}