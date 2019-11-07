<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 20; $i++){
 
              // insert data ke table siswa menggunakan Faker
              
    		    DB::table('siswa')->insert([
    			'nisn' => $faker->numberBetween($min = 0002, $max = 0025),
    			'nama_siswa' => $faker->name,
    			'tanggal_lahir' => $faker->date,
    			'jenis_kelamin' => $faker->randomElement($array = array ('L','P'))
            ]);
        }
    }
}