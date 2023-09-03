<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    public function run()
    {
        // ********** 1 Owner ********** \\
        $owner = User::create([
            'id' => 1,
            'name' => 'maher',
            'email' => 'maher@gmail.com',
            'password' => bcrypt('59602306'),
            'department_id' => 1, //1=الحاسوب
            'sub_department_id' => 'البرمجة', //1=البرمجة

        ]);

        $role = Role::create(['name' => 'owner']);
        $permissions = Permission::all();
        $role->syncPermissions($permissions);
        $owner->assignRole([$role->id]);


        // ********** 3 Admin ********** \\
        $admin = User::create([
            'id' => 2,
            'name' => 'yousef',
            'email' => 'yousef@gmail.com',
            'password' => bcrypt('23012301'),
            'department_id' => 1, //1=الحاسوب
            'sub_department_id' => 'البرمجة', //1=البرمجة
        ]);

        $role = Role::create(['name' => 'admin']);
        $permissions = Permission::all();
        $role->syncPermissions($permissions);
        $admin->assignRole([$role->id]);


    }
}