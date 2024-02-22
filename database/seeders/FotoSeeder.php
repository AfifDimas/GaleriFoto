<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class FotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fotos')->insert([
            'name' => '1.png',
            'deskripsi' => 'Foto Pertama',
            'lokasi_foto' => 'kmn',
            'album' => 'favorit',
            'userId' => '1'
        ]);
    }
}
