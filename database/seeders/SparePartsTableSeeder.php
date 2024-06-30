<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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
                'spare_part_id' => 1011,
                'name' => 'Ban Motor',
                'stock' => 20,
                'entry_date' => '2024-05-17',
                'description' => 'Ban motor untuk berbagai jenis motor.', 
                'price' => 250000,
                'picture' => 'bengkel.png'
            ],
            [
                'spare_part_id' => 1012,
                'name' => 'Rantai Motor',
                'stock' => 15,
                'entry_date' => '2024-05-17',
                'description' => 'Rantai motor tahan lama dan kuat.', 
                'price' => 300000,
                'picture' => 'bengkel.png'
            ],
            [
                'spare_part_id' => 1013,
                'name' => 'Busi',
                'stock' => 30,
                'entry_date' => '2024-05-17',
                'description' => 'Busi untuk mesin motor yang awet.', 
                'price' => 50000,
                'picture' => 'bengkel.png'
            ],
            [
                'spare_part_id' => 1014,
                'name' => 'Kampas Rem',
                'stock' => 25,
                'entry_date' => '2024-05-17',
                'description' => 'Kampas rem berkualitas tinggi.', 
                'price' => 150000,
                'picture' => 'bengkel.png'
            ],
        ]);

        // Update data
        DB::table('spare_parts')
            ->where('spare_part_id', 1011)
            ->update(['stock' => 25]);

        // Delete data
        DB::table('spare_parts')
            ->where('spare_part_id', 1014)
            ->delete();

        $source = public_path('spare_parts/bengkel.png');
        $destination = public_path('storage/spare_parts/bengkel.png');
        
        if (File::exists($source)) {
            File::ensureDirectoryExists(public_path('storage/spare_parts'));
            File::copy($source, $destination);
        }
    }
}
