<?php

namespace Database\Seeders;

use App\Model\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        users::factory()->create([
             'name' => 'Budi Mulya',
             'username' => 'Budi134',
             'password' => '123456',
             'role' => 'siswa',
             'kelas' => 'XII RPL 2'
        ]);

        users::factory()->create([
             'name' => 'Admin',
             'username' => 'Admin Sekolah',
             'password' => 'Rahasia123',
             'role' => 'admin',
        ]);
    }
}
