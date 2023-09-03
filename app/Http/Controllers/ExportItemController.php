<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Export_item;
use App\Models\Item;
use App\Models\Store;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;

class ExportItemController extends Controller
{

    // 'item_id', 'user_id','store_id', 'out_quantity', 'voucher_num', 'date'

    public function index(Request $request)
    {
        $item = Item::all();
        $unit = Unit::all();
        $category = Category::all();
        $user = User::all();
        $store = Store::all();
        $export_item = Export_item::all();
        return view('inventory.export_item.index', compact('item', 'unit', 'category', 'user', 'store', 'export_item'));
    }


    public function create()
    {
        $item = Item::all();
        $user = User::all();
        $store = Store::all();
        $export_item = Export_item::all();
        return view('inventory.export_item.create', compact('item', 'user', 'store', 'export_item'));
    }


    public function store(Request $request)
    {
        // 'item_id', 'user_id','store_id', 'out_quantity', 'voucher_num', 'date'

        $request->validate([

            // 'item_num' => 'required|unique:items,item_num',
            // 'item_name' => 'required|string|min:2|unique:items,item_name',

            'item_id' => 'required',
            'user_id' => 'required',
            'store_id' => 'required',
            'out_quantity' => 'required',
            'voucher_num' => 'required',
            'date' => 'required',

        ]);

        $export_item = new Export_item();

        $export_item->item_id = $request->item_id;
        $export_item->user_id = $request->user_id;
        $export_item->store_id = $request->store_id;
        $export_item->out_quantity = $request->out_quantity;
        // Find the item
        $item = Item::findOrFail($request->item_id);

        // Check if the requested quantity is available in the item's balance
        if ($request->out_quantity > $item->balance) {
            return redirect('inventory/export_item/create')->with('warning', 'الكمية المطلوبة غير متوفرة ' . ' للصنف  :' . $item->balance . ' : الرصيد الحالي هو ' . $item->balance);
        }

        // Update the item's balance
        $item->balance -= $request->out_quantity;

        // Save the item
        $item->update();

        // Check if the remaining quantity is below the low quantity threshold
        if ($item->balance < $item->low_limit) {
            return redirect('inventory/export_item')
                ->with('warning', 'لقد تجاوزت الحد الادنى للصنف الذي قمت بادخاله  : ' . $item->item_name . '!' . 'الرصيد الان : ' . $item->balance . 'الحد الادنى هو : ' . $item->low_limit);
        }

        $export_item->voucher_num = $request->voucher_num;
        $export_item->date = $request->date;

        if ($export_item->save()) {
            return redirect('inventory/export_item')->with('success', 'تمت الاضافة بنجاح!');
        } else {
            return redirect('inventory/export_item/create')->with('warning', '  تحقق من صحة البيانات!');
        }
    }


    public function show($id)
    {
        //
        $item = Item::all();
        $unit = Unit::all();
        $category = Category::all();
        $user = User::all();
        $store = Store::all();
        $export_item = Export_item::find($id);
        return view(
            'inventory.export_item.show',
            compact('item', 'unit', 'category', 'user', 'store', 'export_item')
        );
    }


    public function edit($id)
    {
        $item = Item::all();
        $user = User::all();
        $store = Store::all();
        $export_item = Export_item::find($id);
        return view('inventory.export_item.edit', compact('item', 'user', 'store', 'export_item'));
    }


    public function update(Request $request, $id)
    {
        $export_item = Export_item::find($id);
        $export_item->item_id = $request->item_id;
        $export_item->user_id = $request->user_id;
        $export_item->store_id = $request->store_id;
        $export_item->out_quantity = $request->out_quantity;
        $export_item->voucher_num = $request->voucher_num;
        $export_item->date = $request->date;

        if ($export_item->save()) {
            return redirect('inventory/export_item')->with('info', 'تمت التعديل بنجاح!');
        } else {
            return redirect('inventory/export_item/edit')->with('warning', '  تحقق من صحة البيانات!');
        }
    }

    public function destroy($id)
    {
        Export_item::destroy($id);
        return redirect('export_item')->with('success', 'تمت الحذف بنجاح!');
    }
}
