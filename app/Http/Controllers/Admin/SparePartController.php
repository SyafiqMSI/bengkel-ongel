<?php

namespace App\Http\Controllers\Admin;

use App\Models\SparePart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SparePartController extends Controller
{
    public function index()
    {
        $spareParts = SparePart::all();
        return view('admin.spare_parts.index', compact('spareParts'));
    }

    public function view($id)
    {
        $sparePart = SparePart::findOrFail($id);
        return view('admin.spare_parts.view', compact('sparePart'));
    }
    

    public function create()
    {
        return view('admin.spare_parts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_spare_part' => 'required|integer|unique:spare_parts',
            'nama_spare_part' => 'required|string|max:50',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'deskripsi' => 'nullable|string',
            'harga' => 'nullable|numeric',
            'stock_spare_part' => 'required|integer',
            'tanggal_masuk' => 'required|date',
        ]);

        $imageName = null;
        if ($request->hasFile('gambar')) {
            $imageName = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->storeAs('public/spare_parts', $imageName);
        }

        SparePart::create([
            'id_spare_part' => $request->id_spare_part,
            'nama_spare_part' => $request->nama_spare_part,
            'gambar' => $imageName,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stock_spare_part' => $request->stock_spare_part,
            'tanggal_masuk' => $request->tanggal_masuk,
        ]);

        return redirect()->route('admin.spare_parts.index')
            ->with('success', 'Spare Part created successfully.');
    }

    public function edit($id)
    {
        $sparePart = SparePart::findOrFail($id);
        return view('admin.spare_parts.edit', compact('sparePart'));
    }

    public function update(Request $request, $id)
    {
        $sparePart = SparePart::findOrFail($id);

        $request->validate([
            'id_spare_part' => 'required|integer|unique:spare_parts,id_spare_part,' . $sparePart->id_spare_part . ',id_spare_part',
            'nama_spare_part' => 'required|string|max:50',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'nullable|string',
            'harga' => 'nullable|numeric',
            'stock_spare_part' => 'required|integer',
            'tanggal_masuk' => 'required|date',
        ]);

        if ($request->hasFile('gambar')) {
            $imageName = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->storeAs('public/spare_parts', $imageName);
            if ($sparePart->gambar && file_exists(storage_path("app/public/spare_parts/{$sparePart->gambar}"))) {
                unlink(storage_path("app/public/spare_parts/{$sparePart->gambar}"));
            }
            $sparePart->gambar = $imageName;
        }

        $sparePart->id_spare_part = $request->id_spare_part;
        $sparePart->nama_spare_part = $request->nama_spare_part;
        $sparePart->deskripsi = $request->deskripsi;
        $sparePart->harga = $request->harga;
        $sparePart->stock_spare_part = $request->stock_spare_part;
        $sparePart->tanggal_masuk = $request->tanggal_masuk;
        $sparePart->save();

        return redirect()->route('admin.spare_parts.index')
            ->with('success', 'Spare Part updated successfully.');
    }

    public function destroy($id)
    {
        $sparePart = SparePart::findOrFail($id);

        if ($sparePart->gambar && file_exists(storage_path("app/public/spare_parts/{$sparePart->gambar}"))) {
            unlink(storage_path("app/public/spare_parts/{$sparePart->gambar}"));
        }

        $sparePart->delete();

        return redirect()->route('admin.spare_parts.index')
            ->with('success', 'Spare Part deleted successfully.');
    }
}
