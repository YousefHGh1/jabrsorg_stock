<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\SubDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubDepartmentController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:القسم', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
        $this->middleware('permission:عرض القسم', ['only' => ['index']]);
        $this->middleware('permission:اضافة القسم', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل القسم', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف القسم', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $sub_department = SubDepartment::all();
        $department = Department::all();
        return view('inventory.sub_department.index', compact('sub_department', 'department'));
    }

    public function create()
    {
        $sub_department = SubDepartment::all();
        $department = Department::all();
        return view(
            'inventory.sub_department.create',
            compact('sub_department', 'department')
        );
    }

    public function store(request $request)
    {

        $request->validate(
            [
                'department_id' => 'required',
                'sub_department_num' => 'required|unique:sub_departments,sub_department_num',
                'sub_department_name' => 'required|string|min:2|unique:sub_departments,sub_department_name',
            ],
            [
                'department_id.required' => ' القسم الرئيسي مطلوب',
                'sub_department_num.unique' => 'رقم القسم الفرعي مسجل مسبقا',
                'sub_department_num.required' => 'رقم القسم الفرعي مطلوب',
                'sub_department_name.unique' => 'اسم القسم الفرعي مسجل مسبقا',
                'sub_department_name.required' => 'اسم القسم الفرعي مطلوب',
            ]
        );

        // Save In Database
        $sub_department = new SubDepartment();
        $sub_department->department_id = $request->input('department_id');
        $sub_department->sub_department_name = $request->input('sub_department_name');
        $sub_department->sub_department_num = $request->input('sub_department_num');
        $sub_department->created_by = Auth::user()->name;


        $request = $sub_department->save();

        if ($request === TRUE) {
            return redirect('inventory/sub_department/create')->with('success', 'تم حفظ القسم الفرعي بنجاح *');
        } else {
            return redirect()->back()->with('warning', 'تحقق من الأخطاء الموجودة هنالك خلل ما !!');
        }
    }

    public function edit($id)
    {
        $department = department::all();
        $sub_department = SubDepartment::find($id);
        return view('inventory.sub_department.edit', compact('sub_department', 'department'));
    }

    public function show($id)
    {
        $sub_department = SubDepartment::find($id);
        $department = department::all();
        return view('inventory.sub_department.show', compact('department', 'sub_department'))->with('sub_department', $sub_department);
    }


    public function update(Request $request, $id)
    {
        $sub_department = SubDepartment::find($id);
        $sub_department->department_id = $request->department_id;
        $sub_department->sub_department_name = $request->sub_department_name;
        $sub_department->sub_department_num = $request->sub_department_num;
        $sub_department->save();
        return redirect('inventory/sub_department')->with('success', 'تمت التعديل بنجاح!');
    }


    public function destroy(Request $request)
    {
        $sub_department = SubDepartment::find($request->sub_department_id);

        if ($sub_department->department()->count() > 0) {
            session()->flash('warning', 'لا يمكن حذف قسم لأنه مرتبط بمستخدم بدائرة.');
            return redirect()->route('sub_department.index');
        }

        if ($sub_department->users()->count() > 0) {
            session()->flash('warning', 'لا يمكن حذف قسم لأنه مرتبط بمستخدم.');
            return redirect()->route('sub_department.index');
        }
        if ($sub_department->custody()->count() > 0) {
            session()->flash('warning', 'لا يمكن حذف قسم لأنه مرتبط بعهدة.');
            return redirect()->route('sub_department.index');
        }
        if ($sub_department->InvoiceExport()->count() > 0) {
            session()->flash('warning', 'لا يمكن حذف قسم لأنه مرتبط بصنف صادر.');
            return redirect()->route('sub_department.index');
        }

        $sub_department->delete();

        session()->flash('success', 'تم الحذف بنجاح.');
        return redirect()->route('sub_department.index');
    }

    public function report()
    {
        $sub_department = SubDepartment::simplepaginate(5);
        return view('inventory.sub_department.index', compact('sub_department'));
    }

    public function search(Request $request)
    {
        $department_name = $request->input('department_name');
        $sub_department = SubDepartment::Where('name', 'like', '%' . $department_name . '%')->get();
        return view('inventory.sub_department.index', compact('sub_department'));
    }
}
