<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Peminjaman_Detail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeminjamanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker= \Faker\Factory::create('id_ID');
        for($i=0; $i<10; $i++){
            $bukuId= Buku::inRandomOrder()->first()->id;
            Peminjaman_Detail::create([
                'buku_id' => $bukuId,
            ]);
        }
    }
}
