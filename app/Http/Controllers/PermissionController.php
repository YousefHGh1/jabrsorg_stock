<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:الصلاحيات', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
        $this->middleware('permission:عرض الصلاحيات', ['only' => ['index']]);
        $this->middleware('permission:اضافة الصلاحيات', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل الصلاحيات', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف الصلاحيات', ['only' => ['destroy']]);

    }


    public function index(): View
    {
        $permissions = Permission::all();

        return view('permissions.index', compact('permissions'));
    }

    public function create(): View
    {
        $roles = Role::pluck('name', 'id');

        return view('permissions.create', compact('roles'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'roles' => ['array'],
            'created_by' => Auth::user()->name,
        ]);


        $permission = Permission::create($data);

        $permission->syncRoles($request->input('roles'));

        return redirect()->route(config('permission_ui.route_name_prefix') . 'permissions.index');
    }

    public function edit(Permission $permission): View
    {
        $roles = Role::pluck('name', 'id');

        return view('permissions.edit', compact('permission', 'roles'));
    }

    public function update(Request $request, Permission $permission): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'roles' => ['array'],
        ]);

        $permission->update($data);

        $permission->syncRoles($request->input('roles'));

        return redirect()->route(config('permission_ui.route_name_prefix') . 'permissions.index');
    }

    public function destroy(Request $request)
    {
        Permission::find($request->id)->delete();
        return redirect()->route('permissions.index')->with('success', 'تم حذف الصلاحية بنجاح');
    }


}
