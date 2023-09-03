<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:المخازن', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
        $this->middleware('permission:عرض المخازن', ['only' => ['index']]);
        $this->middleware('permission:اضافة المخازن', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل المخازن', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف المخازن', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $store = Store::all();
        return view('inventory.store.index', compact('store'));
    }

    public function create()
    {
        // الحصول على أعلى قيمة مخزنة في عمود unit_num
        $next_num = Store::max('store_num') + 15;

        // إذا لم يتم العثور على أي سجلات، يتم تعيين القيمة 1 إلى $next_num
        if (!$next_num) {
            $next_num = 15;
        }
        return view('inventory.store.create', compact('next_num'));
    }

    public function store(request $request)
    {


        $request->validate(
            [
                'store_num' => 'required|unique:stores,store_num',
                'store_name' => 'required|string|min:2|unique:stores,store_name',
                'address' => 'required|unique:stores,address',
            ],
            [
                'store_num.unique' => 'رقم المخزن مسجل مسبقا',
                'store_num.required' => 'رقم المخزن  مطلوب',
                'store_name.unique' => 'اسم المخزن مسجل مسبقا',
                'store_name.required' => 'اسم المخزن  مطلوب',
                'address.unique' => ' العنوان مسجل مسبقا',
                'address.required' => ' العنوان  مطلوب',

            ]
        );

        $store = new store();
        $store->store_num =  $request->input('store_num');
        $store->store_name = $request->input('store_name');
        $store->address = $request->input('address');
        $store->created_by = Auth::user()->name;

        $request = $store->save();

        if ($request === TRUE) {
            return redirect('inventory/store/create')->with('success', 'تم حفظ المخزن بنجاح *');
        } else {
            return redirect()->back()->with('warning', 'تحقق من الأخطاء الموجودة هنالك خلل ما !!');
        }
    }

    public function edit($id)
    {
        $store = store::find($id);
        return view('inventory.store.edit', compact('store'));
    }

    public function show($id)
    {
        $store = Store::find($id);
        return view('inventory.store.show', compact('store'))->with('store', $store);
    }


    public function update(Request $request, $id)
    {
        $next_num = Store::max('store_num');

        $store = Store::find($id);
        $store->store_num = $next_num;
        // $store->store_num = $request->store_num;
        $store->store_name = $request->store_name;
        $store->address = $request->address;
        $store->save();
        return redirect('inventory/store')->with('success', 'تمت التعديل بنجاح!');
    }

    public function destroy(Request $request)
    {
        Store::find($request->store_id)->delete();

        return redirect('inventory/store')->with('success', ' تم الحذف بنجاح *');
    }

    public function report()
    {
        $store = Store::simplepaginate(5);
        return view('inventory.store.report', compact('store'));
    }

    public function search(Request $request)
    {
        $store_name = $request->input('store_name');
        $store = Store::Where('name', 'like', '%' . $store_name . '%')->get();
        return view('inventory.store.report', compact('store'));
    }
}