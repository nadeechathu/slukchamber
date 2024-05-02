<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks = 0");
        DB::table('role_has_permissions')->truncate();
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('model_has_permissions')->truncate();

        //creating permissions
        $csvFile = fopen(public_path("csvs/permissions.csv"), "r");

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {

            DB::table('permissions')->insert([
                "name" => $data['0'],
                "guard_name" => "web",
                "system_module_id" => $data['1'] != 'NULL' ? $data['1'] : null
                
            ]);
        }

        fclose($csvFile);

        $adminRole = Role::create(['name' => 'Admin']);
        $editorRole = Role::create(['name' => 'Editor']);

        $permissions = Permission::pluck('name')->toArray();

        $adminRole->givePermissionTo($permissions);

        $editorRole->givePermissionTo($permissions);
    }
}
