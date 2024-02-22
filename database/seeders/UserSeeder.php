<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Afif Dimas Yusnanda',
            'email' => 'afifdimas@gmail.com',
            'password' => '$2y$12$TCNrMtp.rrJmrjmPbU/l9e3DYkoUPBVoI91HXY.ZlGG/eKSFd.PBu'
        ]);
    }
}

// $2a$10$1h2UN38EOvRacLc74Yy3c.LSUsV4fCgmT0doSYD26/PvyhoqWM7ia
