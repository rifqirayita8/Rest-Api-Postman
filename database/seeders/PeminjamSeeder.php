<?php

namespace Database\Seeders;

use App\Models\Peminjam;
use App\Models\Peminjaman_Detail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeminjamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker= \Faker\Factory::create('id_ID');
        for($i=0; $i<10; $i++){
            $peminjamanId= Peminjaman_Detail::inRandomOrder()->first()->id;
            Peminjam::create([
                'nama_peminjam' => $faker->name,
                'tanggal_pinjam' => $faker->date,
                'tanggal_kembali' => $faker->date,
                'peminjaman_id' => $peminjamanId
            ]);
        }
    }
}
