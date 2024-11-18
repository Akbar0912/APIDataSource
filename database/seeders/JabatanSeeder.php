<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jabatan = [
            'Direktur', 'Manajer', 'Supervisor', 'Staff Senior', 'Staff Junior',
            'Analis', 'Teknisi', 'Asisten', 'Konsultan', 'Koordinator'
        ];

        foreach ($jabatan as $jab) {
            Jabatan::create(['nama_jabatan' => $jab]);
        }
    }
}
