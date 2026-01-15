<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         DB::table('kota')->insert([
            ['nama_kota' => 'Jakarta'],
            ['nama_kota' => 'Manado'],
            ['nama_kota' => 'Surabaya'],
            ['nama_kota' => 'Bandung']
        ]);
    }
}
