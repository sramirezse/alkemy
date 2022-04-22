<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CarModel;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // CarModel::truncate();
        $csvData = fopen(base_path('database/csv/models.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                CarModel::create([
                    'id' => $data['0'],
                    'slug' => $data['1'],
                    'model' => $data['2'],
                    'make_id' => $data['3'],
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }
}
