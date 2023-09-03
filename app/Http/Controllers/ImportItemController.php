<?php

namespace App\Http\Controllers;

use App\Models\Import_item;
use App\Models\Item;
use App\Models\Store;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ImportItemController extends Controller
{
    public function index(Request $request)
    {
        $item = Item::all();
        $supplier = Supplier::all();
        $store = Store::all();
        $import_item = Import_item::all();
        return view('inventory.import_item.index', compact('item','supplier', 'store', 'import_item'));
    }


    public function create()
    {
        $item = Item::all();
        $supplier = Supplier::all();
        $store = Store::all();
        $import_item = Import_item::all();
        return view('inventory.import_item.create', compact('item', 'supplier', 'store', 'import_item'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required',
            'supplier_id' => 'required',
            'store_id' => 'required',
            'in_quantity' => 'required',
            'invoice_num' => 'required',
            'price' => 'required',
            'date' => 'required',
        ]);

        $import_item = new Import_item();
        $import_item->item_id = $request->item_id;
        $import_item->supplier_id = $request->supplier_id;
        $import_item->store_id = $request->store_id;

        if($import_item->in_quantity = $request->in_quantity) {
            // Find the item
            $item = Item::findOrFail($import_item->item_id);

            // Update the item's balance
            $item->balance += $import_item->in_quantity;

            // Save the item
            $item->update();
        }

        $import_item->invoice_num = $request->invoice_num;
        $import_item->price = $request->price;
        $import_item->date = $request->date;

        if ($import_item->save()) {
            return redirect('inventory/import_item/create')->with('success', 'تمت الاضافة بنجاح!');
        } else {
            return redirect('inventory/import_item/create')->with('warning', '  تحقق من صحة البيانات!');
        }
    }

    public function show($id)
    {
        $item = Item::all();
        $supplier = Supplier::all();
        $store = Store::all();
        $import_item = Import_item::find($id);
        return view('import_item.show', compact('item','supplier', 'store', 'import_item'));
    }


    public function edit($id)
    {
        $item = Item::all();
        $supplier = Supplier::all();
        $store = Store::all();
        $import_item = Import_item::find($id);
        return view('inventory.import_item.edit', compact('item', 'supplier', 'store', 'import_item'));
    }


    public function update(Request $request, $id)
    {
        $import_item = Import_item::find($id);
        $import_item->item_id = $request->item_id;
        $import_item->supplier_id = $request->supplier_id;
        $import_item->store_id = $request->store_id;
        $import_item->in_quantity = $request->in_quantity;
        $import_item->invoice_num = $request->invoice_num;
        $import_item->price = $request->price;
        $import_item->date = $request->date;

        if ($import_item->save()) {
            return redirect('inventory/import_item')->with('info', 'تمت التعديل بنجاح!');
        } else {
            return redirect('inventory/import_item/edit')->with('warning', '  تحقق من صحة البيانات!');
        }
    }

    public function destroy($id)
    {
        Import_item::destroy($id);
        return redirect('inventory/import_item')->with('success', 'تمت الحذف بنجاح!');
    }
}
