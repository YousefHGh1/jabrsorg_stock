<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceExport extends Model
{
    use HasFactory;

    public $fillable = ['voucher_no', 'voucher_date', 'store_id', 'employee_id','description'];

    public function products()
    {
        return $this->belongsToMany(Item::class)
            ->withPivot('quantity')
            ->withTimestamps();
    }

    public function InvoiceExport_product()
    {
        return $this->hasMany(InvoiceExport_product::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
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
