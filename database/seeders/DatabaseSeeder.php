<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Pengguna::factory(10)->create();

        // Pengguna::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            CarouselSeeder::class,
            RoleSeeder::class,
            PenggunaSeeder::class,
            PengunjungSeeder::class,
            TempatWisataAndTheBoysSeeder::class,
        ]);
    }
}
