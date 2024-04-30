<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Penerbit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker= \Faker\Factory::create('id_ID');
        for($i=0; $i<10; $i++){
            $pengarangId= Penerbit::inRandomOrder()->first()->id;
            Buku::create([
                'judul' => $faker->sentence,
                'pengarang_id' => $pengarangId,
                'pengarang' => $faker->name,
                'tanggal_publikasi' => $faker->date
            ]);
        }
    }
}
