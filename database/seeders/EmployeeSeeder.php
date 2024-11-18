<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 10; $i++) {
            Employee::create([
                'name' => $faker->name,
                'tanggal_lahir' => $faker->date('Y-m-d', '-30 years'),
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'alamat' => $faker->address,
            ]);
        }
    }
}
