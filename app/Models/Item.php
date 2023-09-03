<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Item extends Model
{
    use HasFactory;


    public $table = 'items';
    public $primaryKey = 'id';
    protected $guarded = [];

    public $fillable = [
        'id', 'category_id', 'unit_id', 'item_num', 'item_name', 'open_balance', 'low_limit',
        'balance', 'status','created_by', 'deleted_at', 'created_at', 'updated_at'
    ];
    public $dates = ['created_at', 'updated_at'];


    protected static function booted()
    {

        static::deleting(function ($item) {
            if ($item->InvoiceProduct()->count() > 0 || $item->InvoiceExport_product()->count() > 0) {
                // session()->flash('warning', 'لا يمكن حذف العنصر لأنه مرتبط بجداول أخرى.');
                return false;
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'item_id', 'id');
    }

    public function InvoiceProduct()
    {
        return $this->hasMany(InvoiceProduct::class, 'item_id', 'id');
    }

    public function InvoiceExport_product()
    {
        return $this->hasMany(InvoiceExport_product::class, 'item_id', 'id');
    }

    public function custodyproduct()
    {
        return $this->hasMany(custodyproduct::class, 'item_id', 'id');
    }
    // *************************************************
    // public function Import_items()
    // {
    //     return $this->hasMany(Import_item::class, 'item_id', 'id');
    // }

    // public function Export_items()
    // {
    //     return $this->hasMany(Export_item::class, 'item_id', 'id');
    // }


    // public function getItemsWithBalance()
    // {
    //     return DB::table('items')
    //         ->leftJoin('import_items', 'items.id', '=', 'import_items.item_id')
    //         ->leftJoin('export_items', 'items.id', '=', 'export_items.item_id')
    //         ->leftJoin('units', 'items.unit_id', '=', 'units.id')
    //         ->leftJoin('categories', 'items.category_id', '=', 'categories.id')
    //         ->select(
    //             'items.id',
    //             'items.item_num',
    //             'items.item_name',
    //             'items.low_limit',
    //             'items.open_balance',
    //             'units.unit_name AS unit_name',
    //             'categories.category_name AS category_name',
    //             DB::raw('(items.open_balance + COALESCE(SUM(import_items.in_quantity), 0) - COALESCE(SUM(export_items.out_quantity), 0)) AS balance')
    //         )
    //         ->groupBy('items.id', 'items.item_num', 'items.item_name', 'items.open_balance', 'items.low_limit', 'unit_name', 'category_name')
    //         ->get();
    // }

    //  تجلب رصيد الصنف وتتضيف عليه وارد الاصناف وتطرح منه الصادر حسب ال  PK
    // function calculateItemBalance()
    // {
    //     $items = DB::table('items')->get();
    //     $data = array();
    //     foreach ($items as $item) {
    //         $item_id = $item->id;
    //         $open_balance = $item->open_balance;
    //         $total_in_quantity = DB::table('import_items')
    //             ->where(
    //                 'item_id',
    //                 $item_id
    //             )
    //             ->sum('in_quantity');
    //         $total_out_quantity = DB::table('export_items')
    //             ->where('item_id', $item_id)
    //             ->sum('out_quantity');
    //         $open_balance = $open_balance + $total_in_quantity - $total_out_quantity;
    //         $data[] = $open_balance;
    //     }
    //     return implode('</td></tr><tr><td>', $data);
    //     // return collect($data)->pluck('open_balance')->toArray();
    // }
}