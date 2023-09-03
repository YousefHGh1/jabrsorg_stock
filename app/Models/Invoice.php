<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public $fillable = ['voucher_date', 'invoice_no', 'supplier_id', 'description', 'cash_discount', 'percentage_discount', 'store_id'];

    public function products()
    {
        return $this->belongsToMany(Item::class)
            ->withPivot('quantity', 'price')
            ->withTimestamps();
    }

    public function invoiceproduct()
    {
        return $this->hasMany(InvoiceProduct::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }
}