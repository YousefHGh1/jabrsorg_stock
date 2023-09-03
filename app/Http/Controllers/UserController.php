<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\SubDepartment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:المستخدمين', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
        $this->middleware('permission:عرض المستخدمين', ['only' => ['index']]);
        $this->middleware('permission:اضافة المستخدمين', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل المستخدمين', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف المستخدمين', ['only' => ['destroy']]);

    }

    public function index(Request $request)
    {
        $role = Role::get('name');

        $data = User::orderBy('id', 'DESC')->paginate(5);
        return view('users.index', compact('data','role'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $department = Department::all();
        $sub_department = SubDepartment::all();
        $roles = Role::pluck('name', 'name')->all();

        return view('users.create', compact('roles','department','sub_department'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'department_id' => 'required',
            'sub_department_id' => 'required',
            'roles_name' => 'required'
        ]);

        $input = $request->all();

        $input['password'] = Hash::make($input['password']);
        // $input['department_id'] = $input['department_id'];
        // $input['sub_department_id'] = $input['sub_department_id'];

        $user = User::create($input);
        $user->assignRole($request->input('roles_name'));
        $user->created_by = Auth::user()->name;

        return redirect()->route('users.index')
            ->with('success', 'تم اضافة المستخدم بنجاح');
    }


    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            // 'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
        $input = $request->all();
        // if (!empty($input['password'])) {
        //     $input['password'] = Hash::make($input['password']);
        // } else {
        //     //  $input = array_except($input, array('password'));
        //     $input = array_except($input, array('password'));

        // }
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')
            ->with('success', 'تم تحديث معلومات المستخدم بنجاح');
    }

    public function destroy(Request $request)
    {
        User::find($request->user_id)->delete();
        return redirect()->route('users.index')->with('success', 'تم حذف المستخدم بنجاح');
    }

    public function getdepartments($id)
    {
        $sub_departments = DB::table("sub_departments")->where("department_id", $id)->pluck("sub_department_name", "id");
        return json_encode($sub_departments);
    }
}
