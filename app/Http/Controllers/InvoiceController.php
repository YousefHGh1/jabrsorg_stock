<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceProduct;
use App\Models\Item;
use App\Models\Store;
use App\Models\Supplier;
use App\Models\User;
use App\Notifications\InvoiceNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class InvoiceController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:وارد الأصناف', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
        $this->middleware('permission:عرض وارد الأصناف', ['only' => ['index']]);
        $this->middleware('permission:اضافة وارد الأصناف', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل وارد الأصناف', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف وارد الأصناف', ['only' => ['destroy']]);
    }


    public function index()
    {
        //
        $product = Item::all();
        $supplier =  Supplier::all();
        $store =  Store::all();
        $invoice = Invoice::all();
        $invoiceProducts = InvoiceProduct::all();
        return view('inventory.invoice.index', compact('invoice', 'product', 'supplier', 'invoiceProducts'));
    }

    public function create()
    {
        //
        $products = Item::all();
        $supplier =  Supplier::all();
        $store =  Store::all();
        return view('inventory.invoice.create', compact('products','supplier', 'store'));
    }

    public function store(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $validatedData = $request->validate([
            // 'voucher_no' => 'required',
            'voucher_date' => 'required|date',
            'invoice_no' => 'required|unique:invoices,invoice_no',
            'supplier_id' => 'required',
            'store_id' => 'required',
            'cash_discount' => '',
            'percentage_discount' => '',
            'description' => '',

            'product.*' => 'required|exists:items,id',
            'quantity.*' => 'required|numeric|min:1',
            'price.*' => 'required|numeric|min:0',

            [
                'invoice_no.required' => ' رقم السند  مطلوب',
                'invoice_no.unique' => 'رقم السند  مدخل مسبقا',

            ]
        ]);

        // إنشاء فاتورة جديدة
        $invoice = new Invoice();
        // $invoice->voucher_no = $validatedData['voucher_no'];
        $invoice->voucher_date = $validatedData['voucher_date'];
        $invoice->invoice_no = $validatedData['invoice_no'];
        $invoice->supplier_id = $validatedData['supplier_id'];
        $invoice->store_id = $validatedData['store_id'];
        $invoice->cash_discount = $validatedData['cash_discount'];
        $invoice->percentage_discount = $validatedData['percentage_discount'] / 100 ;
        $invoice->description = $validatedData['description'];
        $invoice->created_by = Auth::user()->name;

        $invoice->save();

        // حفظ الأصناف المضافة إلى الفاتورة
        for ($i = 0; $i < count($validatedData['product']); $i++) {
            $product = Item::findOrFail($validatedData['product'][$i]);
            $quantity = $validatedData['quantity'][$i];
            $price = $validatedData['price'][$i];

            $invoiceProduct = new InvoiceProduct();
            $invoiceProduct->invoice_id = $invoice->id;
            $invoiceProduct->item_id = $product->id;

            if ($invoiceProduct->quantity = $quantity) {
                // Find the item
                $item = Item::findOrFail($invoiceProduct->item_id);

                // Update the item's balance
                $item->balance += $invoiceProduct->quantity;

                // Save the item
                $item->update();
            }
            $invoiceProduct->price = $price;
            $invoiceProduct->save();
        }
        // إرسال إشعار للأصناف المضافة
        $users = User::role('owner')->get();

        Notification::send(
            $users,
            new InvoiceNotification(
                $invoice->id,
                $invoice->description,
                $invoice->voucher_date,
            )
        );
        // رسالة نجاح العملية
        return redirect()->back()->with('success', 'تم حفظ الفاتورة بنجاح.');
    }

    public function show($id)
    {
        // البحث عن الفاتورة باستخدام الرقم المعرف
        $invoice = Invoice::findOrFail($id);

        // الحصول على الأصناف الموجودة داخل الفاتورة
        $invoiceProducts = InvoiceProduct::where('invoice_id', $id)->get();
        //************************************************ الاشعارات****************************************
        $getId = DB::table('notifications')->where('data->invoice_id', $id)->pluck('id');

        // $users = User::role('owner')->get();
        DB::table('notifications')->where('id', $getId)->update(['read_at' => now()]);


        return view('inventory.invoice.show', compact('invoice', 'invoiceProducts'));
    }

    public function invoiceshow($id)
    {
        // البحث عن الفاتورة باستخدام الرقم المعرف
        $invoice = Invoice::findOrFail($id);

        // الحصول على الأصناف الموجودة داخل الفاتورة
        $invoiceProducts = InvoiceProduct::where('invoice_id', $id)->get();

        return view('inventory.invoice.invoiceshow', compact('invoice', 'invoiceProducts'));
    }
    public function edit($id)
    {
        //
        $products = Item::all();
        $invoice = Invoice::find($id);
        $supplier =  Supplier::all();
        $store =  Store::all();
        return view('inventory.invoice.edit', compact('products', 'supplier', 'invoice'));
    }

    public function update(Request $request, $id)
    {
        // العثور على الفاتورة المطلوبة
        $invoice = Invoice::findOrFail($id);

        // التحقق من صحة البيانات المدخلة
        $validatedData = $request->validate([
            'voucher_no' => 'required',
            'voucher_date' => 'required|date',
            'invoice_no' => 'required',
            'supplier_id' => 'required',
            'product.*' => 'required|exists:items,id',
            'quantity.*' => 'required|numeric|min:1',
            'price.*' => 'required|numeric|min:0',
            'store_id' => 'required',
            'cash_discount' => '',
            'percentage_discount' => '',
            'description' => '',
        ]);

        // تحديث الحقول الجديدة
        $invoice->voucher_no = $validatedData['voucher_no'];
        $invoice->voucher_date = $validatedData['voucher_date'];
        $invoice->invoice_no = $validatedData['invoice_no'];
        $invoice->supplier_id = $validatedData['supplier_id'];
        $invoice->store_id = $validatedData['store_id'];
        $invoice->cash_discount = $validatedData['cash_discount'];
        $invoice->percentage_discount = $validatedData['percentage_discount'];
        $invoice->description = $validatedData['description'];
        $invoice->save();

        // حذف الأصناف المرتبطة بالفاتورة
        foreach ($invoice->invoiceproduct as $product) {
            // العثور على الصنف المرتبط بالفاتورة
            $item = Item::findOrFail($product->item_id);

            // تحديث الرصيد
            $item->balance -= $product->quantity;
            $item->update();

            // حذف الصنف من الفاتورة
            $product->delete();
        }

        // إضافة الأصناف الجديدة إلى الفاتورة
        for ($i = 0; $i < count($validatedData['product']); $i++) {
            $product = Item::findOrFail($validatedData['product'][$i]);
            $quantity = $validatedData['quantity'][$i];
            $price = $validatedData['price'][$i];

            $invoiceProduct = new invoiceproduct();
            $invoiceProduct->invoice_id = $invoice->id;
            $invoiceProduct->item_id = $product->id;

            // تحديث الرصيد الجديد
            $item = Item::findOrFail($invoiceProduct->item_id);
            $item->balance += $quantity;
            $item->update();

            $invoiceProduct->quantity = $quantity;
            $invoiceProduct->price = $price;
            $invoiceProduct->save();
        }

        // رسالة نجاح العملية
        return redirect()->back()->with('success', 'تم تحديث الفاتورة بنجاح.');
    }

    public function destroy(Request $request)
    {
        // العثور على الفاتورة المطلوبة
        $invoice = Invoice::findOrFail($request->invoice_id);

        // حذف الأصناف المرتبطة بالفاتورة
        foreach ($invoice->invoiceproduct as $product) {
            // العثور على الصنف المرتبط بالفاتورة
            $item = Item::findOrFail($product->item_id);

            // تحديث الرصيد
            $item->balance -= $product->quantity;
            $item->update();

            // حذف الصنف من الفاتورة
            $product->delete();
        }

        // حذف الفاتورة
        $invoice->delete();

        // رسالة نجاح العملية
        return redirect()->back()->with('success', 'تم حذف الفاتورة بنجاح.');
    }
}