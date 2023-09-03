<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustodyProduct extends Model
{
    use HasFactory;

    public $fillable = ['custody_id', 'item_id', 'quantity'];

    public function custody()
    {
        return $this->belongsTo(Custody::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }
}
