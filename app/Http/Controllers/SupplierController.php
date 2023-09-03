<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:الموردين', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
        $this->middleware('permission:عرض الموردين', ['only' => ['index']]);
        $this->middleware('permission:اضافة الموردين', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل الموردين', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف الموردين', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $supplier = Supplier::all();
        return view('inventory.supplier.index', compact('supplier'));
    }

    public function create()
    {
        return view('inventory.supplier.create');
    }

    public function store(request $request)
    {
        $request->validate(
            [
                'supplier_num' => 'required|unique:suppliers,supplier_num',
                'supplier_name' => 'required|string|min:2|unique:suppliers,supplier_name',
                'address' => 'required',
                'phone' => 'required',
                'ipn' => 'required|unique:suppliers,ipn',
                'logo' => 'mimes:jpg,jpeg,png',
            ],
            [
                'supplier_num.unique' => 'رقم المورد مسجل مسبقا',
                'supplier_num.required' => 'رقم المورد  مطلوب',
                'supplier_name.unique' => 'اسم المورد مسجل مسبقا',
                'supplier_name.required' => 'اسم المورد  مطلوب',
                'address.unique' => ' العنوان مسجل مسبقا',
                'address.required' => ' العنوان  مطلوب',
                'phone.unique' => ' الهاتف مسجل مسبقا',
                'phone.required' => ' الهاتف  مطلوب',
                'ipn.required' => ' مرخص التشغيل مطلوب',
                'ipn.unique' => ' مرخص التشغيل مدخل مسبقا',

            ]
        );


        $supplier = new Supplier();
        $supplier->supplier_num = $request->input('supplier_num');
        $supplier->supplier_name = $request->input('supplier_name');
        $supplier->address = $request->input('address');
        $supplier->phone = $request->input('phone');
        $supplier->ipn = $request->input('ipn');
        // $supplier->logo = $request->input('logo');
        $supplier->note = $request->input('note');
        $supplier->created_by = Auth::user()->name;


        // لحفظ الملف كملف وليس نص
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logo1 = time() . '.' . $logo->getClientOriginalExtension();
            $logo->move('logo_supplier', $logo1);
            $supplier->logo = $logo1;
        }


        $request = $supplier->save();

        if ($request === TRUE) {
            return redirect('inventory/supplier/create')->with('success', 'تم حفظ المورد بنجاح *');
        } else {
            return redirect()->back()->with('warning', 'تحقق من الأخطاء الموجودة هنالك خلل ما !!');
        }
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('inventory.supplier.edit', compact('supplier'));
    }

    public function show($id)
    {
        $supplier = Supplier::find($id);
        return view('inventory.supplier.show', compact('supplier'))->with('supplier', $supplier);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'supplier_num' => 'required',
            'supplier_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'ipn' => 'required',
            'logo' => 'mimes:jpg,jpeg,png',
        ]);

        $supplier = Supplier::find($id);
        $supplier->supplier_num = $request->supplier_num;
        $supplier->supplier_name = $request->supplier_name;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->ipn = $request->input('ipn');
        // $supplier->logo = $request->input('logo');
        $supplier->note = $request->input('note');
        $supplier->created_by = Auth::user()->name;


        // لحفظ الملف كملف وليس نص
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logo1 = time() . '.' . $logo->getClientOriginalExtension();
            $logo->move('logo_supplier', $logo1);
            $supplier->logo = $logo1;
        }


        $supplier->save();
        return redirect('inventory/supplier')->with('success', 'تمت التعديل بنجاح!');
    }


    public function destroy(Request $request)
    {
        Supplier::find($request->supplier_id)->delete();

        return redirect('inventory/supplier')->with('success', ' تم الحذف بنجاح *');
    }


    public function report()
    {
        $supplier = Supplier::simplepaginate(5);
        return view('inventory.supplier.report', compact('supplier'));
    }

    public function search(Request $request)
    {
        $supplier_name = $request->input('supplier_name');
        $supplier = Supplier::Where('name', 'like', '%' . $supplier_name . '%')->get();
        return view('inventory.supplier.report', compact('supplier'));
    }
}