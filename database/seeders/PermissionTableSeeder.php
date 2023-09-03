<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{

    public function run()
    {
        $permissions = [
            'الوحدات', 'عرض الوحدات', 'تعديل الوحدات', 'حذف الوحدات', 'اضافة الوحدات',
            'العائلات', 'عرض العائلات', 'تعديل العائلات', 'حذف العائلات', 'اضافة العائلات',
            'الأصناف', 'عرض الأصناف', 'تعديل الأصناف', 'حذف الأصناف', 'اضافة الأصناف',
            'المخازن', 'عرض المخازن', 'تعديل المخازن', 'حذف المخازن', 'اضافة المخازن',
            'الموردين', 'عرض الموردين', 'تعديل الموردين', 'حذف الموردين', 'اضافة الموردين',
            'وارد الأصناف', 'عرض وارد الأصناف', 'تعديل وارد الأصناف', 'حذف وارد الأصناف', 'اضافة وارد الأصناف',
            'صادر الأصناف', 'عرض صادر الأصناف', 'تعديل صادر الأصناف', 'حذف صادر الأصناف', 'اضافة صادر الأصناف',
            'العهد', 'عرض العهد', 'تعديل العهد', 'حذف العهد', 'اضافة العهد',
            'الدائرة', 'عرض الدائرة', 'تعديل الدائرة', 'حذف الدائرة', 'اضافة الدائرة',
            'القسم', 'عرض القسم', 'تعديل القسم', 'حذف القسم', 'اضافة القسم',
            'المستخدمين', 'عرض المستخدمين', 'تعديل المستخدمين', 'حذف المستخدمين', 'اضافة المستخدمين',
            'الصلاحيات', 'عرض الصلاحيات', 'تعديل الصلاحيات', 'حذف الصلاحيات', 'اضافة الصلاحيات',
            'الأدوار', 'عرض الأدوار', 'تعديل الأدوار', 'حذف الأدوار', 'اضافة الأدوار',
            'التقارير', 'تقرير المجاميع', 'تقرير حركة الأصناف', 'تقرير الجرد',
            'مدير النظام', 'الاعدادات',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}