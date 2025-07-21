<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Item;
use App\Models\Student;
use App\Models\User;
use Database\Factories\StudentFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name'     => 'administrator',
            'email'    => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
        ]);

        $barang = [
            'Bola Basket',
            'Bola Sepak',
            'Raket Badminton',
            'Net Badminton',
            'Meja Pingpong',
            'Bola Pingpong',
            'Kursi Lipat',
            'Proyektor',
            'Papan Tulis',
            'Speaker Portable',
        ];
        foreach ($barang as $data) {
            Item::create([
                'name' => $data,
                'status' => 'Tersedia',
            ]);
        }

        $siswa = [
            'Ahmad Fauzi',
            'Budi Santoso',
            'Citra Dewi',
            'Dewi Lestari',
            'Eko Prasetyo',
            'Fajar Nugroho',
            'Gita Permata',
            'Hendra Wijaya',
            'Indah Sari',
            'Joko Susilo',
        ];
        foreach ($siswa as $data) {
            Student::create([
                'classroom_id' => rand(1, 10),
                'name' => $data,
            ]);
        }

        $kelas = [
            'TKJ 1',
            'TKJ 2',
            'TKJ 3',
            'RPL 1',
            'RPL 2',
            'RPL 3',
            'DKV 1',
            'DKV 2',
            'DKV 3',
            'SIJA 1',
            'SIJA 2',
            'SIJA 3',
        ];
        foreach ($kelas as $data) {
            Classroom::create([
                'name' => $data,
            ]);
        }
    }
}
