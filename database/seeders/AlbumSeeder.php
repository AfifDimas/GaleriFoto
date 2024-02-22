<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('albums')->insert([
            'name' => 'Favorit',
            'deskripsi' => 'Album Pertama',
            'userId' => '1',
            'created_at' => '2024-02-10 10:15:14',
            'updated_at' => '2024-02-10 10:15:15'
        ]);
        DB::table('albums')->insert([
            'name' => 'Pemandangan',
            'deskripsi' => 'Album Kedua',
            'userId' => '1',
            'created_at' => '2024-02-10 10:15:30',
            'updated_at' => '2024-02-10 10:15:30'
        ]);
    }
}
