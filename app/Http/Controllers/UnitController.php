<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:الوحدات', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
        $this->middleware('permission:عرض الوحدات', ['only' => ['index']]);
        $this->middleware('permission:اضافة الوحدات', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل الوحدات', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف الوحدات', ['only' => ['destroy']]);
    }

    public function index()
    {
        $unit = Unit::all();
        return view('inventory.unit.index', compact('unit'));
    }

    public function create()
    {
        $next_num = Unit::max('unit_num') + 1;
        if (!$next_num) {
            $next_num = 1;
        }
        return view('inventory.unit.create', compact('next_num'));
    }

    public function store(Request $request)
    {
        // الحصول على أعلى قيمة مخزنة في عمود unit_num
        $next_num = Unit::max('unit_num') + 1;

        // إذا لم يتم العثور على أي سجلات، يتم تعيين القيمة 1 إلى $next_num
        if (!$next_num) {
            $next_num = 1;
        }

        $request->validate(
            [
                'unit_num' => 'required|unique:units,unit_num',
                'unit_name' => 'required|string|min:2|unique:units,unit_name',
            ],
            [
                'unit_name.unique' => 'اسم الوحدة مسجل مسبقا',
                'unit_name.required' => 'اسم الوحدة  مطلوب',
            ]
        );

        $unit = new Unit();
        $unit->unit_num = $next_num;
        $unit->unit_name = $request->input('unit_name');
        $unit->created_by = Auth::user()->name;
        $request = $unit->save();

        if ($request === TRUE) {
            return redirect('inventory/unit/create')->with('success', 'تم حفظ الوحدة بنجاح *');
        } else {
            return redirect()->back()->with('warning', 'تحقق من الأخطاء الموجودة هنالك خلل ما !!');
        }
    }

    public function show($id)
    {
        $unit = Unit::find($id);
        return view('inventory.unit.show', compact('unit'))->with('unit', $unit);
    }

    public function edit($id)
    {
        $unit = Unit::find($id);
        return view('inventory.unit.edit', compact('unit'));
    }

    public function update(Request $request, $id)
    {
        // الحصول على أعلى قيمة مخزنة في عمود unit_num
        // $next_num = Unit::max('unit_num') ;


        $unit = Unit::find($id);
        $unit->unit_num = $request->unit_num;
        // $unit->unit_num = $next_num;
        $unit->unit_name = $request->unit_name;
        $unit->save();
        return redirect('inventory/unit')->with('success', 'تمت التعديل بنجاح !!');
    }

    public function destroy(Request $request)
    {
        $unit = Unit::find($request->unit_id);


        if (!$unit) {
            session()->flash('error', 'الوحدة غير موجود');
            return redirect()->route('unit.index');
        }

        if ($unit->Items()->count() > 0) {
            session()->flash('warning', 'لا يمكن حذف الوحدة لأنه مرتبط بصنف.');
            return redirect()->route('unit.index');
        }


        $unit->delete();
        session()->flash('success', 'تم الحذف بنجاح.');
        return redirect()->route('unit.index');
    }
}