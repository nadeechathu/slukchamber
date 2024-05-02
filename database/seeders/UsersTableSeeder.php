<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("SET foreign_key_checks = 0");
        DB::table('users')->truncate();

        $user = User::create([
            'name' => "Administrator",
            'email' => "admin@guisrilanka.com",
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('gui12345'), // password
            'remember_token' => null,

        ]);

        $user->assignRole('Admin');
    }
}
