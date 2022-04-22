<?php

namespace Database\Seeders;

use App\Models\ServiceDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //faker data
         ServiceDetail::factory(10)->create();

    }
}
