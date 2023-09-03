<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Export_item extends Model
{
    use HasFactory;

    public $table = 'export_items';
    public $primaryKey = 'id';

    public $fillable = [
        'id', 'unit_id', 'category_id', 'item_id', 'user_id',
        'store_id', 'out_quantity', 'voucher_num', 'date','created_by','deleted_at', 'created_at', 'updated_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }
}
