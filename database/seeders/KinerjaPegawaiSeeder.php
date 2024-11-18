<?php

namespace Database\Seeders;

use App\Models\Departemen;
use App\Models\Employee;
use App\Models\Jabatan;
use App\Models\KinerjaPegawai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KinerjaPegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');

        $pegawaiIds = Employee::pluck('employee_id')->toArray();
        $departemenIds = Departemen::pluck('departemen_id')->toArray();
        $jabatanIds = Jabatan::pluck('jabatan_id')->toArray();

        $location = [
            'longitude' => $faker->longitude, // Menghasilkan nilai longitude acak
            'latitude' => $faker->latitude,  
        ];

        for ($i = 0; $i < 10; $i++) {
            KinerjaPegawai::create([
                'employee_id' => $faker->randomElement($pegawaiIds),
                'departemen_id' => $faker->randomElement($departemenIds),
                'jabatan_id' => $faker->randomElement($jabatanIds),
                'nilai_kinerja' => $faker->randomFloat(2, 1, 5),
                'gaji' => $faker->numberBetween(3000000, 20000000),
                'jumlah_proyek' => $faker->numberBetween(1, 5),
                'longitude' => $location['longitude'],
                'latitude' => $location['latitude'],
            ]);
        }
    }
}
