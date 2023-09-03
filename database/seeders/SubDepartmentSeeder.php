<?php

namespace Database\Seeders;

use App\Models\SubDepartment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $subdepartment = SubDepartment::create([
            'department_id' => 1,
            'sub_department_num' => 1,
            'sub_department_name' => 'البرمجة',
        ]);
    }
}
