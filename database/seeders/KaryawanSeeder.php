<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;


class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

    	for($i = 1; $i <= 10; $i++){
    	      // insert data ke table pegawai menggunakan Faker
              DB::table('ptsRizziq')->insert([
                'namaKaryawan' => $faker->name,
                'hadirMasuk' => $faker->numberBetween(55, 100),
                'izinMasuk' => $faker->numberBetween(1,6),
                'bolosMasuk' => $faker->numberBetween(1, 2),
                'telatMasuk' => $faker->numberBetween(1, 3),
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime,
               ]);
            }
    }
}
