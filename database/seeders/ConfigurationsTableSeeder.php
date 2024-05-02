<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigurationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("SET foreign_key_checks = 0");
        DB::table('configurations')->truncate();        

        //creating permissions
        $csvFile = fopen(public_path("csvs/configurations.csv"), "r");

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {

            DB::table('configurations')->insert([
                "configuration_key" => $data['0'],
                "configuration_value" => $data['1'],
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
                
            ]);
        }

        fclose($csvFile);
    }
}
