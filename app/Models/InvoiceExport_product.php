<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceExport_product extends Model
{
    use HasFactory;

    public $fillable = ['invoice_export_id', 'item_id', 'quantity'];


    public function invoiceExport()
    {
        return $this->belongsTo(InvoiceExport::class);
    }


    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }
}
