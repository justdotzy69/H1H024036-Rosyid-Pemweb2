<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $this->call([
            ProgramStudiSeeder::class,
            MatakuliahSeeder::class,   // ← tambahkan ini (Tugas 1)
        ]);

        Mahasiswa::factory()->count(30)->create(); 
        $this->call(MahasiswaMatakuliahSeeder::class);
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
