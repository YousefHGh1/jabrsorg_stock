<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public $table = 'departments';
    public $primaryKey = 'id';
    public $fillable = ['id', 'department_num', 'department_name','created_by','deleted_at'];
    public $dates = ['created_at', 'updated_at'];

    public function users()
    {
        return $this->hasMany(User::class, 'department_id', 'id');
    }

    public function sub_departments()
    {
        return $this->hasMany(SubDepartment::class, 'department_id', 'id');
    }


    protected static function booted()
    {

        static::deleting(function ($department) {
            if ($department->users()->count() > 0 || $department->sub_departments()->count() > 0) {
                // session()->flash('warning', 'لا يمكن حذف العنصر لأنه مرتبط بجداول أخرى.');
                return false;
            }
        });
    }
}