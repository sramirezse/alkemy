<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CarModelYear;

class CarModelYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // CarModelYear::truncate();
        $csvData = fopen(base_path('database/csv/years_models.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                CarModelYear::create([
                    'id' => $data['0'],
                    'year' => $data['1'],
                    'car_model_id' => $data['2'],
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }
}
