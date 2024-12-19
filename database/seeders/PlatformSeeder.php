<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('platform_sosial_media')->insert([
            [
                'nama_plaform' => 'Whatsapp'
            ],
            [
                'nama_plaform' => 'Instagram'
            ],
            [
                'nama_plaform' => 'Tiktok'
            ],
            [
                'nama_plaform' => 'Youtube'
            ],
            [
                'nama_plaform' => 'Website'
            ],
        ]);
    }
}
