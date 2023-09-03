<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDepartment extends Model
{
    use HasFactory;

    public $table = 'sub_departments';

    public $primaryKey = 'id';

    public $fillable = [
        'id', 'department_id', 'sub_department_num', 'sub_department_name', 'created_by','deleted_at'
    ];

    public $dates = ['created_at', 'updated_at'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function custody()
    {
        return $this->hasMany(Custody::class);
    }

    public function InvoiceExport()
    {
        return $this->hasMany(InvoiceExport::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    protected static function booted()
    {

        static::deleting(function ($sub_department) {
            if ($sub_department->users()->count() > 0 || $sub_department->custody()->count() > 0|| $sub_department->InvoiceExport()->count() > 0) {
                // session()->flash('warning', 'لا يمكن حذف العنصر لأنه مرتبط بجداول أخرى.');
                return false;
            }
        });
    }
}