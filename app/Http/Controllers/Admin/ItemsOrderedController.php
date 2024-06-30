<?php

namespace App\Http\Controllers\Admin;

use App\Models\ItemsOrdered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appointment;

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
        return view('admin.item_ordered.view', compact('itemsOrder'));
    }    

    public function create()
    {
        $appointments = Appointment::all();
        return view('admin.item_ordered.create', compact('appointments'));
    }

    public function store(Request $request)
    {

        ItemsOrdered::create([
            'items_ordered_id' => $request->id_items_ordered,
            'appointment_id' => $request->appointment_id,
            'spare_part_id' => $request->sparepart_id,
            'amount' => $request->amount,
        ]);

        return redirect()->route('admin.item_ordered.index')
            ->with('success', 'Items Ordered created successfully.');
    }

    public function edit($id)
    {
        $itemsOrder = ItemsOrdered::findOrFail($id);
        return view('admin.item_ordered.edit', compact('itemsOrder'));
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
