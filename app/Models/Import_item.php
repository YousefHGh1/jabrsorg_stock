<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import_item extends Model
{
    use HasFactory;

    public $table = 'import_items';
    public $primaryKey = 'id';

    public $fillable = [
        'id', 'item_id', 'supplier_id',
        'store_id', 'in_quantity', 'invoice_num', 'price', 'date', 'created_by','deleted_at', 'created_at', 'updated_at'
    ];
    public $dates = ['created_at', 'updated_at', 'date'];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
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
