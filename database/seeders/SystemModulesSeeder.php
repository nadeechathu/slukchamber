<?php

namespace Database\Seeders;

use App\Models\SystemModule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("SET foreign_key_checks = 0");
        DB::table('system_modules')->truncate();

        $system_modules = ['posts', 'testimonials', 'services', 'categories', 'gallery_images', 'component_manager' ];
        foreach ($system_modules as $system_module){
            $module = SystemModule::create([
                'name' => $system_module,
                'status' => "1",

            ]);
        }
    }
}
