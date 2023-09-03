<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ItemController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:الأصناف', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
        $this->middleware('permission:عرض الأصناف', ['only' => ['index']]);
        $this->middleware('permission:اضافة الأصناف', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل الأصناف', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف الأصناف', ['only' => ['destroy']]);
    }


    public function index()
    {
        $item = Item::all();
        $unit = Unit::all();
        $category = Category::all();
        return view('inventory.item.index', compact(
            'item',
            'unit',
            'category'
        ));
    }

    public function create()
    {
        $next_num = Category::max('category_num') + 10;

        $item = Item::all();
        $unit = Unit::all();
        $category = Category::all();
        return view('inventory.item.create', compact(
            'item',
            'unit',
            'category'
        ));
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'category_id' => 'required',
                'unit_id' => 'required',
                'item_num' => 'required|unique:items,item_num',
                'item_name' => 'required|string|min:2|unique:items,item_name',
                'open_balance' => 'required',
                'low_limit' => 'required',
                'status' => 'required',
            ],
            [
                'unit_id.required' => 'اسم الوحدة  مطلوب',
                'category_id.required' => 'اسم العائلة  مطلوب',
                'item_name.required' => 'اسم الصنف  مطلوب',
                'item_name.unique' => ' الصنف مسجل مسبقا',
                'open_balance.required' => ' الرصيد الافتتاحي مطلوب  مطلوب',
                'low_limit.required' => '  الحد الادنى    مطلوب',
                'item_num.required' => '   رقم الصنف    مطلوب',
                'item_num.unique' => '   رقم الصنف    مسجل مسبقا',
                'status.required' => '   نوع الصنف  مطلوب',
            ]
        );



        $item = new Item();
        $item->category_id = $request->input('category_id');
        $item->unit_id = $request->input('unit_id');
        $item->item_num = $request->input('item_num');
        $item->item_name = $request->input('item_name');
        $item->open_balance = $request->input('open_balance');
        $item->low_limit = $request->input('low_limit');
        $item->status = $request->input('status');
        $item->created_by = Auth::user()->name;
        $item->balance = $request->open_balance + $request->balance; // تخزين open_balance داخل balance
        $request = $item->save();

        // نوع المستخدم
        // $role = Role::where('name', 'owner')->first();
        // المستخدم الذي يملك  صلاحية owner
        // $users = User::whereHas('roles', function ($query) use ($role) {
        //     $query->where('name', $role->name);
        // })->get();

        // Notification::send(
        //     $users,
        //     new ItemNotification(
        //         $item->item_id,
        //         $item->item_name,
        //         $item->low_limit,
        //         $item->balance
        //     )
        // );

        if ($request === TRUE) {
            return redirect('inventory/item/create')->with('success', 'تمت الاضافة بنجاح!');
        } else {
            return redirect()->back()->with('warning', '  تحقق من صحة البيانات!');
        }
    }

    public function show($id)
    {
        $item = Item::find($id);
        $unit = Unit::all();
        $category = Category::all();
        return view('inventory.item.show', compact('item', 'unit', 'category'));
    }

    public function edit($id)
    {
        $item = Item::find($id);
        $unit = Unit::all();
        $category = Category::all();
        return view('inventory.item.edit', compact('item', 'unit', 'category'));
    }

    public function update(Request $request, $id)
    {
        $item = Item::find($id);
        $item->category_id = $request->category_id;
        $item->unit_id = $request->unit_id;
        $item->item_num = $request->item_num;
        $item->item_name = $request->item_name;
        $item->open_balance = $request->open_balance;
        $item->low_limit = $request->low_limit;
        $item->status = $request->status;

        if ($item->save()) {
            return redirect('inventory/item')->with('info', 'تمت التعديل بنجاح!');
        } else {
            return redirect('inventory/item')->with('warning', '  تحقق من صحة البيانات!');
        }
    }

    public function destroy(Request $request)
    {
        $item = Item::find($request->item_id);

        if (!$item) {
            session()->flash('error', 'الصنف غير موجود');
            return redirect()->route('item.index');
        }

        if ($item->InvoiceProduct()->count() > 0) {
            session()->flash('warning', 'لا يمكن حذف الصنف لأنه مرتبط بوارد.');
            return redirect()->route('item.index');
        }

        if ($item->InvoiceExport_product()->count() > 0) {
            session()->flash('warning', 'لا يمكن حذف الصنف لأنه مرتبط  بصادر.');
            return redirect()->route('item.index');
        }

        $item->delete();
        session()->flash('success', 'تم الحذف بنجاح.');
        return redirect()->route('item.index');
    }
}