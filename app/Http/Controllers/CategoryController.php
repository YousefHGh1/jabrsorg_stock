<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
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
        $category = Category::all();
        return view('inventory.category.index', compact('category'));
    }

    public function create()
    {
        // الحصول على أعلى قيمة مخزنة في عمود unit_num
        $next_num = Category::max('category_num') + 10;

        // إذا لم يتم العثور على أي سجلات، يتم تعيين القيمة 1 إلى $next_num
        if (!$next_num) {
            $next_num = 10;
        }

        return view('inventory.category.create', compact('next_num'));
    }

    public function store(Request $request)
    {
        // الحصول على أعلى قيمة مخزنة في عمود unit_num
        $next_num = Category::max('category_num') + 10;

        // إذا لم يتم العثور على أي سجلات، يتم تعيين القيمة 1 إلى $next_num
        if (!$next_num) {
            $next_num = 10;
        }


        $request->validate(
            [
                'category_num' => 'required|unique:categories,category_num',
                'category_name' => 'required|string|min:2|unique:categories,category_name',
            ],
            [
                'category_name.unique' => 'اسم العائلة مسجل مسبقا',
                'category_name.required' => 'اسم العائلة  مطلوب',
            ]
        );

        $category = new Category();
        $category->category_num = $next_num;
        $category->category_name = $request->input('category_name');
        $category->created_by = Auth::user()->name;

        $request = $category->save();

        if ($request === TRUE) {
            return redirect('inventory/category/create')->with('success', 'تم حفظ العائلة بنجاح *');
        } else {
            return redirect()->back()->with('warning', 'تحقق من الأخطاء الموجودة هنالك خلل ما !!');
        }
    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('inventory.category.show', compact('category'))->with('category', $category);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('inventory.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // $next_num = Category::max('category_num');

        $category = Category::find($id);
        $category->category_num = $request->category_num;
        // $category->category_num = $next_num;
        $category->category_name = $request->category_name;
        $category->save();
        return redirect('inventory/category')->with('success', 'تمت التعديل بنجاح !!');
    }

    public function destroy(Request $request)
    {
            $category = Category::find($request->category_id);

            if (!$category) {
                session()->flash('error', 'العائلة غير موجود');
                return redirect()->route('category.index');
            }

            if ($category->Items()->count() > 0) {
                session()->flash('warning', 'لا يمكن حذف العائلة لأنه مرتبط بصنف.');
                return redirect()->route('category.index');
            }


            $category->delete();
            session()->flash('success', 'تم الحذف بنجاح.');
            return redirect()->route('category.index');

    }

    // public function destroy($id)
    // {
    //     $category = Category::find($id);

    //     if (!$category) {
    //         session()->flash('error', 'العائلة غير موجود');
    //         return redirect()->route('category.index');
    //     }

    //     if ($category->Items()->count() > 0) {
    //         session()->flash('warning', 'لا يمكن حذف العائلة لأنه مرتبط بصنف.');
    //         return redirect()->route('category.index');
    //     }


    //     $category->delete();
    //     session()->flash('success', 'تم الحذف بنجاح.');
    //     return redirect()->route('category.index');
    // }
}