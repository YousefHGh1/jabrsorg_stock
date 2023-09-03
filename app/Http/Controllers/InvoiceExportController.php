<?php

namespace App\Http\Controllers;

use App\Models\InvoiceExport;
use App\Models\InvoiceExport_product;
use App\Models\Item;
use App\Models\Store;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Notifications\ExportNotification;
use App\Notifications\ItemNotification;
use Illuminate\Support\Facades\Notification;
use Spatie\Permission\Models\Role;

class InvoiceExportController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:صادر الأصناف', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
        $this->middleware('permission:عرض صادر الأصناف', ['only' => ['index']]);
        $this->middleware('permission:اضافة صادر الأصناف', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل صادر الأصناف', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف صادر الأصناف', ['only' => ['destroy']]);
        // $this->shareCommonData();
    }

    public function index()
    {
        $invoice_exports = DB::table('invoice_exports')

            ->join('employees', 'invoice_exports.employee_id', '=', 'employees.id')
            ->join('stores', 'invoice_exports.store_id', '=', 'stores.id')
            ->join('invoice_export_products', 'invoice_exports.id', '=', 'invoice_export_products.invoice_export_id')
            ->join('items', 'invoice_export_products.item_id', '=', 'items.id')

            ->select(
                'invoice_exports.id',
                'invoice_exports.voucher_no',
                'invoice_exports.voucher_date',
                'employees.employee_name',
                'stores.store_name',
                DB::raw('GROUP_CONCAT(items.item_name," (", invoice_export_products.quantity, ") &nbsp;") AS products')
            )

            ->groupBy(
                'invoice_exports.id',
                'invoice_exports.voucher_no',
                'invoice_exports.voucher_date',
                'employees.employee_name',
                'stores.store_name'
            )

            ->get();

        return view('inventory.invoice_export.index', compact('invoice_exports'));

        // $product = Item::all();
        // $store = Store::all();
        // $employee = Employee::all();
        $invoice_exports = InvoiceExport::all();
        // $invoiceExport_products = invoiceExport_product::all();
        // return view('inventory.invoice_export.index', compact('invoice_exports', 'product', 'store','employee', 'invoiceExport_products'));
    }


    public function create()
    {
        //
        $products = Item::all();
        $Employee = Employee::all();
        $store =  Store::all();

        return view('inventory.invoice_export.create', compact('products', 'store', 'Employee'));
    }


    public function store(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $validatedData = $request->validate([
            'voucher_no' => 'required|unique:invoice_exports,voucher_no',
            'voucher_date' => 'required|date',
            'store_id' => 'required',
            'employee_id' => 'required',
            'description' => '',

            'product.*' => 'required|exists:items,id',
            'quantity.*' => 'required|numeric|min:1',
        ]);

        // إنشاء فاتورة جديدة
        $invoiceExport = new InvoiceExport();
        $invoiceExport->voucher_no = $validatedData['voucher_no'];
        $invoiceExport->voucher_date = $validatedData['voucher_date'];
        $invoiceExport->store_id = $validatedData['store_id'];
        $invoiceExport->employee_id = $validatedData['employee_id'];
        $invoiceExport->description = $validatedData['description'];
        $invoiceExport->created_by = Auth::user()->name;

        $invoiceExport->save();

        // حفظ الأصناف المضافة إلى الفاتورة
        for ($i = 0; $i < count($validatedData['product']); $i++) {
            $product = Item::findOrFail($validatedData['product'][$i]);
            $quantity = $validatedData['quantity'][$i];

            $invoiceExport_product = new InvoiceExport_product();
            $invoiceExport_product->invoice_export_id = $invoiceExport->id;
            $invoiceExport_product->item_id = $product->id;

            if ($invoiceExport_product->quantity = $quantity) {
                // Find the item
                $item = Item::findOrFail($invoiceExport_product->item_id);

                // Update the item's balance
                if ($invoiceExport_product->quantity > $item->balance) {
                    return redirect('inventory/invoice_export/create')->with('warning', 'الكمية المطلوبة غير متوفرة ' . ' للصنف  :' . $item->item_name . ' : الرصيد الحالي هو ' . $item->balance);
                }
                $item->balance -= $invoiceExport_product->quantity;

                // Save the item
                $item->update();
            }
            $invoiceExport_product->save();
        }

        $users = User::role('owner')->get();

        Notification::send(
            $users,
            new ExportNotification(
                $invoiceExport->id,
                $invoiceExport->description,
                $invoiceExport->voucher_date,
            )
        );

        // رسالة نجاح العملية
        return redirect()->back()->with('success', 'تم حفظ الفاتورة بنجاح.');
    }

    public function show($id)
    {
        // البحث عن الفاتورة باستخدام الرقم المعرف
        $invoiceExport = InvoiceExport::findOrFail($id);

        // الحصول على الأصناف الموجودة داخل الفاتورة
        $invoiceExport_products = invoiceExport_product::where('invoice_export_id', $id)->get();

        $Employee = Employee::all();
        //************************************************ الاشعارات****************************************
        $getId = DB::table('notifications')->where('data->export_id', $id)->pluck('id');

        // $users = User::role('owner')->get();
        DB::table('notifications')->where('id', $getId)->update(['read_at' => now()]);

        return view('inventory.invoice_export.show', compact('invoiceExport', 'invoiceExport_products', 'Employee'));
    }

    public function exportshow($id)
    {
        // البحث عن الفاتورة باستخدام الرقم المعرف
        $invoiceExport = InvoiceExport::findOrFail($id);

        // الحصول على الأصناف الموجودة داخل الفاتورة
        $invoiceExport_products = invoiceExport_product::where('invoice_export_id', $id)->get();

        $Employee = Employee::all();

        return view('inventory.invoice_export.exportshow', compact('invoiceExport', 'invoiceExport_products', 'Employee'));
    }

    public function edit($id)
    {
        //
        $invoiceExport = InvoiceExport::findOrFail($id);
        $products = Item::all();
        $store = Store::all();
        $Employee = Employee::all();
        return view('inventory.invoice_export.edit', compact('products', 'Employee', 'invoiceExport', 'store'));
    }


    public function update(Request $request, $id)
    {
        // العثور على الفاتورة المطلوبة
        $invoiceExport = InvoiceExport::findOrFail($id);

        // التحقق من صحة البيانات المدخلة
        $validatedData = $request->validate([
            // 'department_id' => 'required',
            'employee_id' => 'required',
            // 'user_id' => 'required',
            'voucher_no' => 'required|unique:invoice_exports,voucher_no,' . $id,
            'voucher_date' => 'required|date',
            'store_id' => 'required',
            'product.*' => 'required|exists:items,id',
            'quantity.*' => 'required|numeric|min:1',
        ]);

        // تحديث الحقول الجديدة
        // $custody->department_id = $validatedData['department_id'];
        $invoiceExport->employee_id = $validatedData['employee_id'];
        // $custody->user_id = $validatedData['user_id'];
        $invoiceExport->voucher_no = $validatedData['voucher_no'];
        $invoiceExport->voucher_date = $validatedData['voucher_date'];
        $invoiceExport->store_id = $validatedData['store_id'];

        $invoiceExport->save();

        // حذف الأصناف المرتبطة بالفاتورة
        foreach ($invoiceExport->InvoiceExport_product as $product) {
            // العثور على الصنف المرتبط بالفاتورة
            $item = Item::findOrFail($product->item_id);

            // تحديث الرصيد
            $item->balance += $product->quantity;
            $item->update();

            // حذف الصنف من الفاتورة
            $product->delete();
        }

        // إضافة الأصناف الجديدة إلى الفاتورة
        for ($i = 0; $i < count($validatedData['product']); $i++) {
            $product = Item::findOrFail($validatedData['product'][$i]);
            $quantity = $validatedData['quantity'][$i];

            $InvoiceExport_product = new InvoiceExport_product();
            $InvoiceExport_product->invoice_export_id = $invoiceExport->id;
            $InvoiceExport_product->item_id = $product->id;

            // تحديث الرصيد الجديد
            $item = Item::findOrFail($InvoiceExport_product->item_id);
            $item->balance -= $quantity;
            $item->update();

            $InvoiceExport_product->quantity = $quantity;
            $InvoiceExport_product->save();
        }

        // رسالة نجاح العملية
        return redirect()->back()->with('success', 'تم تحديث الفاتورة بنجاح.');
    }

    public function destroy($id)
    {
        // العثور على الفاتورة المطلوبة
        $invoiceExport = InvoiceExport::findOrFail($id);

        // حذف الأصناف المرتبطة بالفاتورة
        foreach ($invoiceExport->InvoiceExport_product as $product) {
            // العثور على الصنف المرتبط بالفاتورة
            $item = Item::findOrFail($product->item_id);

            // تحديث الرصيد
            $item->balance += $product->quantity;
            $item->update();

            // حذف الصنف من الفاتورة
            $product->delete();
        }

        // حذف الفاتورة
        $invoiceExport->delete();

        // رسالة نجاح العملية
        return redirect()->back()->with('success', 'تم حذف الفاتورة بنجاح.');
    }

    protected function shareCommonData()
    {
        $items = Item::where('low_limit', '>=', 'balance')->get();
        view()->share('items', $items);
        // dd($items);
    }
}
