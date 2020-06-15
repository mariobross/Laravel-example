<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //insert Data ke Table Mahasiswa
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 57; $i++) {
            DB::table('mahasiswa')->insert([
                'nama' => $faker->name,
                'nrp' => $faker->unique()->randomNumber($nbDigits = 8),
                'email' => $faker->safeEmail,
                'jurusan' => $faker->word
            ]);
        }
    }
}
