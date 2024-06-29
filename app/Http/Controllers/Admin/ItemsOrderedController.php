<?php

namespace App\Http\Controllers\Admin;

use App\Models\ItemsOrdered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class ItemsOrderedController extends Controller
{
    public function index()
    {
        $itemsorder = ItemsOrdered::all();
        return view('admin.item_ordered.index', compact('itemsorder'));
    }

    public function view($id)
    {
        $itemsOrder = ItemsOrdered::findOrFail($id);
        $username = User::findOrFail($itemsOrder->user_id)->name;
        return view('admin.item_ordered.view', compact('itemsorder', 'username'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.item_ordered.create', compact('users'));
    }

    public function store(Request $request)
    {

        ItemsOrdered::create([
            'id_items_ordered' => $request->id_items_ordered,
            'appointment_id' => $request->appointment_id,
            'sparepart_id' => $request->sparepart_id,
            'amount' => $request->amount,
        ]);

        return redirect()->route('admin.item_ordered.index')
            ->with('success', 'Items Ordered created successfully.');
    }

    public function edit($id)
    {
        $itemsOrder = ItemsOrdered::findOrFail($id);
        return view('admin.item_ordered.edit', compact('appointment'));
    }

    public function update(Request $request, $id)
    {
        $itemsOrder = ItemsOrdered::findOrFail($id);

        //belum selesai

        // Update the appointment with new data
        $itemsOrder->update($request->all());

        return redirect()->route('admin.item_ordered.index')
            ->with('success', 'Items Ordered updated successfully.');
    }

    public function destroy($id)
    {
        $itemsorder = ItemsOrdered::findOrFail($id);

        $itemsorder->delete();

        return redirect()->route('admin.item_ordered.index')
            ->with('success', 'Items Ordered deleted successfully.');
    }
}
