<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:العائلات', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
        $this->middleware('permission:عرض العائلات', ['only' => ['index']]);
        $this->middleware('permission:اضافة العائلات', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل العائلات', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف العائلات', ['only' => ['destroy']]);
    }

    public function index()
    {
        $next_num = Unit::max('unit_num') + 1;
        if (!$next_num) {
            $next_num = 1;
        }
        $unit = Unit::all();
        return view('inventory.unit.units', compact('unit','next_num'));
    }

//     public function create()
//     {
//         // return view('inventory.unit.unit');
//     }

    public function store(Request $request)
    {
         // الحصول على أعلى قيمة مخزنة في عمود unit_num
         $next_num = Unit::max('unit_num') + 1;

         // إذا لم يتم العثور على أي سجلات، يتم تعيين القيمة 1 إلى $next_num
         if (!$next_num) {
             $next_num = 1;
         }
        $request->validate([
            // 'unit_num' => 'required|unique:units,unit_num',
            'unit_name' =>'required|string|min:2|unique:units,unit_name',
        ],

);

        $unit = new Unit();
        $unit->unit_num = $next_num;
        $unit->unit_name = $request->input('unit_name');
        $unit->created_by = Auth::user()->name;

        $request = $unit->save();

        if ($request === TRUE) {
            return redirect('inventory/unit')->with('success', 'تم حفظ الوحدة بنجاح *');
        } else {
            return redirect()->back();
        }



    }

    public function show($id)
    {
        // $unit = Unit::find($id);
        // return view('inventory.unit.show', compact('unit'))->with('unit', $unit);
    }

    public function edit($id)
    {
        $unit = Unit::find($id);
        return view('inventory.unit.edit', compact('unit'));
    }

    public function update(Request $request, $id)
    {
        $unit = Unit::find($id);
        $unit->unit_num = $request->unit_num;
        $unit->unit_name = $request->unit_name;
        $unit->save();
        return redirect('inventory/unit')->with('success', 'تمت التعديل بنجاح !!');
    }


        public function destroy($id)
        {
            $unit = Unit::find($id);

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
