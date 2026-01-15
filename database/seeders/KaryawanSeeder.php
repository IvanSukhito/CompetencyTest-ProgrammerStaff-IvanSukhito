<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for($i=1; $i<=100; $i++) {                   
            DB::table('karyawan')->insert([
            [
                'nama_karyawan' => rand(1,1000).'_Karyawan',
                'tanggal_lahir' => rand(1970,2000).'-'.rand(1,12).'-'.rand(1,28),
                'jabatan_id' => rand(1, 4),
                'kota_id' => rand(1,4),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        }
       
    }
}
