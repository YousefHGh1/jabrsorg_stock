<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'mohammed',
            'email' =>  'mohammed@gmail.com',
            // 'phone' =>  '2708078',
            // 'department_id' =>  2301,
            // 'sub_department_id' =>  23011,
            'password' => Hash::make('20112011'),
        ]);
    }
}
