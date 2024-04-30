<?php

namespace Database\Seeders;

use App\Models\Penerbit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenerbitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker= \Faker\Factory::create('en_US');
        for($i=0; $i<10; $i++){
            Penerbit::create([
                'nama_penerbit' => $faker->name, 
              ]                                                          
            );
        }
    }
}
