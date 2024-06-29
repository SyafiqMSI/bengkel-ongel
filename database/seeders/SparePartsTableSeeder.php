<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SparePartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('spare_parts')->insert([
            [
                'id_spare_part' => 1011,
                'nama_spare_part' => 'Ban Motor',
                'stock_spare_part' => 20,
                'tanggal_masuk' => '2024-05-17',
                'deskripsi' => 'Ban motor untuk berbagai jenis motor.', 
                'harga' => 250000 
            ],
            [
                'id_spare_part' => 1012,
                'nama_spare_part' => 'Rantai Motor',
                'stock_spare_part' => 15,
                'tanggal_masuk' => '2024-05-17',
                'deskripsi' => 'Rantai motor tahan lama dan kuat.', 
                'harga' => 300000 
            ],
            [
                'id_spare_part' => 1013,
                'nama_spare_part' => 'Busi',
                'stock_spare_part' => 30,
                'tanggal_masuk' => '2024-05-17',
                'deskripsi' => 'Busi untuk mesin motor yang awet.', 
                'harga' => 50000 
            ],
            [
                'id_spare_part' => 1014,
                'nama_spare_part' => 'Kampas Rem',
                'stock_spare_part' => 25,
                'tanggal_masuk' => '2024-05-17',
                'deskripsi' => 'Kampas rem berkualitas tinggi.', 
                'harga' => 150000 
            ],
        ]);

        // Update data
        DB::table('spare_parts')
            ->where('id_spare_part', 1011)
            ->update(['stock_spare_part' => 25]);

        // Delete data
        DB::table('spare_parts')
            ->where('id_spare_part', 1014)
            ->delete();
    }
}