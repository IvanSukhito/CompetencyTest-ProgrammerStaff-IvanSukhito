<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('jabatan')->insert([
            ['nama_jabatan' => 'HRD'],
            ['nama_jabatan' => 'Accounting'],
            ['nama_jabatan' => 'Directur'],
            ['nama_jabatan' => 'Sales']
        ]);
    }
}
