<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:الدائرة', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
        $this->middleware('permission:عرض الدائرة', ['only' => ['index']]);
        $this->middleware('permission:اضافة الدائرة', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل الدائرة', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف الدائرة', ['only' => ['destroy']]);
    }


    public function index(Request $request)
    {
        $department = Department::all();
        return view('inventory.department.index', compact('department'));
    }

    public function create()
    {
        return view('inventory.department.create');
    }

    public function store(request $request)
    {

        $request->validate(
            [
                'department_num' => 'required|unique:departments,department_num',
                'department_name' => 'required|string|min:2|unique:departments,department_name',
            ],
            [
                'department_num.unique' => 'رقم القسم مسجل مسبقا',
                'department_num.required' => 'رقم القسم  مطلوب',
                'department_name.unique' => 'اسم القسم مسجل مسبقا',
                'department_name.required' => 'اسم القسم  مطلوب',
            ]
        );

        $department = new Department();
        $department->department_num = $request->input('department_num');
        $department->department_name = $request->input('department_name');
        $department->created_by = Auth::user()->name;

        $request = $department->save();

        if ($request === TRUE) {
            return redirect('inventory/department/create')->with('success', 'تم حفظ القسم بنجاح *');
        } else {
            return redirect()->back()->with('warning', 'تحقق من الأخطاء الموجودة هنالك خلل ما !!');
        }
    }

    public function edit($id)
    {
        $department = Department::find($id);
        return view('inventory.department.edit', compact('department'));
    }

    public function show($id)
    {
        $department = Department::find($id);
        // $department = department::all();
        return view('inventory.department.show', compact('department'))->with('department', $department);
    }


    public function update(Request $request, $id)
    {
        $department = Department::find($id);
        $department->department_num = $request->department_num;
        $department->department_name = $request->department_name;
        $department->save();
        return redirect('inventory/department')->with('success', 'تمت التعديل بنجاح!');
    }



    public function destroy(Request $request)
    {
        $department = Department::find($request->department_id);

        if ($department->sub_departments()->count() > 0) {
            session()->flash('warning', 'لا يمكن حذف الدائرة لأنه مرتبط بقسم فرعي.');
            return redirect()->route('department.index');
        }

        if ($department->users()->count() > 0) {
            session()->flash('warning', 'لا يمكن حذف الدائرة لأنه مرتبط بمستخدم.');
            return redirect()->route('department.index');
        }


        $department->delete();

        session()->flash('success', 'تم الحذف بنجاح.');
        return redirect()->route('department.index');
    }

    public function report()
    {
        $department = Department::simplepaginate(5);
        return view('inventory.department.index', compact('department'));
    }

    public function search(Request $request)
    {
        $department_name = $request->input('department_name');
        $department = Department::Where('name', 'like', '%' . $department_name . '%')->get();
        return view('inventory.department.index', compact('department'));
    }
}
