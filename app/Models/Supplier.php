<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    public $table = 'suppliers';
    public $primaryKey = 'id';

    public $fillable = [
        'id', 'supplier_num', 'supplier_name', 'address','phone' ,'created_by','deleted_at', 'ipn',
        'logo', 'note'
    ];
    public $dates = ['created_at', 'updated_at'];

    public function invoice()
    {
        return $this->hasMany(Invoice::class, 'supplier_id', 'id');
    }
}