<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Make;
use Illuminate\Support\Facades\DB;
class MakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('makes')->truncate();
        $csvData = fopen(base_path('database/csv/makes.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                Make::create([
                    'id' => $data['0'],
                    'slug' => $data['1'],
                    'make' => $data['2'],
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }
}
