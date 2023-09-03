<?php

namespace App\Http\Controllers;

use App\Models\Export_item;
use App\Models\Import_item;
use App\Models\InvoiceExport_product;
use App\Models\InvoiceProduct;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:التقارير', ['only' => ['totalreport', 'searchbalance', 'transactions', 'transactions_report','elgard', 'elgarditem']]);
        $this->middleware('permission:تقرير المجاميع', ['only' => ['totalreport']]);
        $this->middleware('permission:تقرير حركة الأصناف', ['only' => ['transactions_report', 'transactions']]);
        $this->middleware('permission:تقرير الجرد', ['only' => ['elgard', 'elgarditem']]);
    }

    public function totalreport()
    {

        $totalreport = Item::select(
            'items.id',
            'items.item_num',
            'items.item_name',
            'items.open_balance',
            'items.balance',
            DB::raw('SUM(invoice_products.quantity) as total_incoming'),
            DB::raw('SUM(invoice_export_products.quantity) as total_outgoing')
        )
            ->leftJoin('invoice_products', 'invoice_products.item_id', '=', 'items.id')
            ->leftJoin('invoice_export_products', 'invoice_export_products.item_id', '=', 'items.id')
            ->groupBy('items.id', 'items.item_num', 'items.item_name', 'items.open_balance', 'items.balance')
            ->get();

        return view('inventory.report.totalreport', [
            'totalreport' => $totalreport
        ]);
    }

    public function searchbalance(Request $request)
    {
        $InvoiceProduct = InvoiceProduct::all();
        $InvoiceExport_product = InvoiceExport_product::all();
        $balance = $request->input('balance');
        $totalreport = Item::where('balance', $balance)->get();
        return view('inventory.report.totalreport', compact('totalreport', 'InvoiceExport_product', 'InvoiceProduct'))->with('success', 'تمت عملية البحث !');
    }

    public function transactions($itemId)
    {
        $items = DB::table('items')
            ->select('items.open_balance')
            ->where('items.id', '=', $itemId)
            ->get();

        // احضار حركات وارد الصنف
        $purchases = DB::table('invoices')
            ->join('invoice_products', 'invoices.id', '=', 'invoice_products.invoice_id')
            ->join('items', 'invoice_products.item_id', '=', 'items.id')
            ->select('invoices.invoice_no', 'invoices.voucher_date', 'invoice_products.quantity', 'items.item_name', 'items.item_num', 'items.open_balance', 'items.balance', DB::raw("'شراء' as type"))
            ->where('invoice_products.item_id', '=', $itemId)
            ->get();

        // احضار حركات صادر الصنف
        $exports = DB::table('invoice_exports')
            ->join('invoice_export_products', 'invoice_exports.id', '=', 'invoice_export_products.invoice_export_id')
            ->join('items', 'invoice_export_products.item_id', '=', 'items.id')
            ->select('invoice_exports.voucher_no', 'invoice_exports.voucher_date', 'invoice_export_products.quantity', 'items.item_name', 'items.item_num', 'items.open_balance', 'items.balance', DB::raw("'صرف' as type"))
            ->where('invoice_export_products.item_id', '=', $itemId)
            ->get();

        // دمج حركات وارد و صادر في مصفوفة واحدة
        $transactions = $purchases->merge($exports);

        // ترتيب الحركات بتاريخ الفاتورة بشكل تصاعدي
        $transactions = $transactions->sortBy('voucher_date');

        $balance = $items->first()->open_balance; // الرصيد الافتتاحي

        foreach ($transactions as $key => $transaction) {
            if ($transaction->type == 'وارد') {
                $balance += $transaction->quantity; // إضافة عملية وارد إلى الرصيد
            } elseif ($transaction->type == 'صادر') {
                $balance -= $transaction->quantity; // طرح عملية صادر من الرصيد
            }

            $transactions[$key]->balance = $balance; // تحديث قيمة الرصيد في المصفوفة
        }


        return view('inventory.report.transactions', compact('transactions'));
    }

    public function transactions_report()
    {
        $items = Item::all();

        return view('inventory.report.index', compact('items'));
    }

    public function elgard()
    {
        $elgard = Item::all();

        return view('inventory.report.elgard', compact('elgard'));
    }

    public function elgarditem(Request $request)
    {
        $items = Item::all();
        $status = $request->input('status');
        $elgard = Item::where('status', $status)->get();
        return view('inventory.report.elgard', compact('elgard', 'items'))->with('success', 'تمت عملية البحث !');
    }
}
