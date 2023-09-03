<?php

namespace App\Http\Controllers;

use App\Models\Custody;
use App\Models\CustodyProduct;
use App\Models\Department;
use App\Models\Item;
use App\Models\SubDepartment;
use App\Models\User;
use App\Notifications\CustodyNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Notifications\ItemNotification;
use Illuminate\Support\Facades\Notification;
use Spatie\Permission\Models\Role;

class CustodyController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:العهد', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
        $this->middleware('permission:عرض العهد', ['only' => ['index']]);
        $this->middleware('permission:اضافة العهد', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل العهد', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف العهد', ['only' => ['destroy']]);
    }


    public function index()
    {

        $custody = DB::table('custodies')
            ->join('departments', 'custodies.department_id', '=', 'departments.id')
            // ->join('sub_departments', 'custodies.sub_department_id', '=', 'sub_departments.id')
            ->join('users', 'custodies.user_id', '=', 'users.id')
            ->join('custody_products', 'custodies.id', '=', 'custody_products.custody_id')
            ->join('items', 'custody_products.item_id', '=', 'items.id')
            ->select('custodies.id', 'departments.department_name', 'custodies.sub_department_id', 'users.name', 'custodies.date', 'custodies.custody_num', DB::raw('GROUP_CONCAT(items.item_name," (", custody_products.quantity, ") &nbsp;") AS products'))
            ->groupBy('custodies.id', 'departments.department_name', 'custodies.sub_department_id', 'users.name', 'custodies.date', 'custodies.custody_num')
            ->get();
        return view('inventory.custody.index', compact('custody'));
    }

    public function create()
    {
        //
        $department = Department::all();
        $sub_department = SubDepartment::all();
        $user = User::all();
        $products = Item::all();

        return view('inventory.custody.create', compact('department', 'sub_department', 'user', 'products'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'department_id' => 'required',
            'sub_department_id' => 'required',
            'user_id' => 'required',
            'custody_num' => 'required',
            'date' => 'required',
            'description' => 'required',

            'product.*' => 'required|exists:items,id',
            'quantity.*' => 'required|numeric|min:1',
        ], [
            'product.*' => 'required|exists:items,id',
            'quantity.*' => 'required|numeric|min:1',

        ]);

        $custody = new Custody();

        $custody->department_id = $request->department_id;
        $custody->sub_department_id = $request->sub_department_id;
        $custody->user_id = $request->user_id;
        $custody->custody_num = $request->custody_num;
        $custody->date = $request->date;
        $custody->description = $request->description;
        $custody->created_by = Auth::user()->name;


        $custody->save();

        // حفظ الأصناف المضافة إلى الفاتورة
        for ($i = 0; $i < count($request['product']); $i++) {
            $product = Item::findOrFail($request['product'][$i]);
            $quantity = $request['quantity'][$i];

            $custodyProduct = new CustodyProduct();
            $custodyProduct->custody_id = $custody->id;
            $custodyProduct->item_id = $product->id;
            // $custodyProduct->quantity = $quantity;

            if ($custodyProduct->quantity = $quantity) {
                // Find the item
                $item = Item::findOrFail($custodyProduct->item_id);

                // Update the item's balance
                if ($custodyProduct->quantity > $item->balance) {
                    return redirect('inventory/custody/create')->with('warning', 'الكمية المطلوبة غير متوفرة ' . ' للصنف  :' . $item->item_name . ' : الرصيد الحالي هو ' . $item->balance);
                }
                $item->balance -= $custodyProduct->quantity;

                // Save the item
                $item->update();
            }

            $custodyProduct->save();
        }
        $users = User::role('owner')->get();

        Notification::send(
            $users,
            new CustodyNotification(
                $custody->id,
                $custody->description,
                $custody->date,

            )
        );


        // رسالة نجاح العملية
        return redirect()->back()->with('success', 'تم حفظ الفاتورة بنجاح.');
    }


    public function show($id)
    {
        // البحث عن الفاتورة باستخدام الرقم المعرف
        $custody = Custody::findOrFail($id);

        // الحصول على الأصناف الموجودة داخل الفاتورة
        $custodyProducts = CustodyProduct::where('custody_id', $id)->get();


        //************************************************ الاشعارات****************************************
        $getId = DB::table('notifications')->where('data->custody_id', $id)->pluck('id');

        // $users = User::role('owner')->get();
        DB::table('notifications')->where('id', $getId)->update(['read_at' => now()]);

        return view('inventory.custody.show', compact('custody', 'custodyProducts'));
    }

    public function custodyshow($id)
    {
        // البحث عن الفاتورة باستخدام الرقم المعرف
        $custody = Custody::findOrFail($id);

        // الحصول على الأصناف الموجودة داخل الفاتورة
        $custodyProducts = CustodyProduct::where('custody_id', $id)->get();

        return view('inventory.custody.custodyshow', compact('custody', 'custodyProducts'));
    }

    public function edit($id)
    {
        $department = Department::all();
        $sub_department = SubDepartment::all();
        $products = Item::all();
        $custody = Custody::find($id);
        $user =  User::all();
        return view('inventory.custody.edit', compact('products', 'user', 'custody', 'department', 'sub_department'));
    }



    public function update(Request $request, $id)
    {
        // العثور على الفاتورة المطلوبة
        $custody = Custody::findOrFail($id);

        // التحقق من صحة البيانات المدخلة
        $validatedData = $request->validate([
            'department_id' => 'required',
            'sub_department_id' => 'required',
            'user_id' => 'required',
            'custody_num' => 'required',
            'date' => 'required',
            'product.*' => 'required|exists:items,id',
            'quantity.*' => 'required|numeric|min:1',
        ]);

        // تحديث الحقول الجديدة
        $custody->department_id = $validatedData['department_id'];
        $custody->sub_department_id = $validatedData['sub_department_id'];
        $custody->user_id = $validatedData['user_id'];
        $custody->custody_num = $validatedData['custody_num'];
        $custody->date = $validatedData['date'];
        $custody->save();

        // حذف الأصناف المرتبطة بالفاتورة
        foreach ($custody->custodyproduct as $product) {
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

            $custodyProduct = new custodyproduct();
            $custodyProduct->custody_id = $custody->id;
            $custodyProduct->item_id = $product->id;

            // تحديث الرصيد الجديد
            $item = Item::findOrFail($custodyProduct->item_id);
            $item->balance -= $quantity;
            $item->update();

            $custodyProduct->quantity = $quantity;
            $custodyProduct->save();
        }

        // رسالة نجاح العملية
        return redirect()->back()->with('success', 'تم تحديث الفاتورة بنجاح.');
    }

    public function destroy($id)
    {
        // العثور على الفاتورة المطلوبة
        $custody = Custody::findOrFail($id);

        // حذف الأصناف المرتبطة العهدة
        foreach ($custody->custodyproduct as $product) {
            // العثور على الصنف المرتبط العهدة
            $item = Item::findOrFail($product->item_id);

            // تحديث الرصيد
            $item->balance += $product->quantity;
            $item->update();

            // حذف الصنف من الفاتورة
            $product->delete();
        }

        // حذف الفاتورة
        $custody->delete();

        // رسالة نجاح العملية
        return redirect()->back()->with('success', 'تم حذف العهدة بنجاح.');
    }



    public function getdepartments($id)
    {
        $sub_departments = DB::table("sub_departments")->where("department_id", $id)->pluck("sub_department_name", "id");
        return json_encode($sub_departments);
    }

    protected function shareCommonData()
    {
        $items = Item::where('low_limit', '>=', 'balance')->get();
        view()->share('items', $items);
        // dd($items);
    }
}
