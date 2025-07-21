<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data user dengan berbagai role
        $users = [
            [
                'name' => 'Administrator',
                'email' => 'admin@sekolah.id',
                'password' => bcrypt('password123'),
                'role' => 'admin'
            ],
            [
                'name' => 'Guru Matematika',
                'email' => 'guru@sekolah.id',
                'password' => bcrypt('password123'),
                'role' => 'teacher'
            ],
            [
                'name' => 'Siswa Contoh',
                'email' => 'siswa@sekolah.id',
                'password' => bcrypt('password123'),
                'role' => 'student'
            ],
            [
                'name' => 'Staf TU',
                'email' => 'staff@sekolah.id',
                'password' => bcrypt('password123'),
                'role' => 'staff'
            ],
            [
                'name' => 'Kepala Sekolah',
                'email' => 'kepsek@sekolah.id',
                'password' => bcrypt('rahasia123'),
                'role' => 'admin'
            ]
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                $user
            );
        }

        $this->command->info('Seeder role berhasil ditambahkan!');
    }
}
