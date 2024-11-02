<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $category = $request->query('category');

        $category
            ? $medicines = Medicine::where('type', $category)->get()
            : $medicines = Medicine::all();

        return view('medicine.index', compact('medicines'));
    }

    public function manageMedicines()
    {
        $medicines = Medicine::all();
        return view('medicine.manage.index', compact('medicines'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name-store' => 'required',
            'price-store' => 'required|numeric',
            'stock-store' => 'required|numeric',
            'type-store' => 'required',
            'description-store' => 'required',
        ]);

        $medicine = Medicine::where('name', $request->input('name-store'))->first();

        $process = $medicine
            ? $medicine->update(['stock' => $medicine->stock + $request->input('stock-store')])
            : Medicine::create([
                'name' => $request->input('name-store'),
                'price' => $request->input('price-store'),
                'type' => $request->input('type-store'),
                'stock' => $request->input('stock-store'),
                'description' => $request->input('description-store'),
            ]);

        return $process
            ? redirect()->route('admin.medicine.index')->with('success', [
                'title' => 'Success',
                'message' => 'Data berhasil ditambahkan'
            ])
            : redirect()->route('admin.medicine.index')->with('error', [
                'title' => 'Error',
                'message' => 'Data gagal ditambahkan'
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $medicine = Medicine::where('slug', $slug)->firstOrFail();
        return view('medicine.detail', compact('medicine'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $medicine = Medicine::findOrFail($id);

        $request->validate([
            'name-update' => 'required|string',
            'price-update' => 'required|numeric',
            'stock-update' => 'required|numeric',
            'type-update' => 'required|string',
            'description-update' => 'required|string',
        ]);

        $process = $medicine->update([
            'name' => $request->input('name-update'),
            'price' => $request->input('price-update'),
            'type' => $request->input('type-update'),
            'stock' => $request->input('stock-update'),
            'description' => $request->input('description-update'),
        ]);

        return $process
            ? redirect()->route('admin.medicine.index')->with('success', [
                'title' => 'Success',
                'message' => 'Data berhasil diubah'
            ])
            : redirect()->route('admin.medicine.index')->with('error', [
                'title' => 'Error',
                'message' => 'Data gagal diubah'
            ]);
    }

    /**
     * update stock
     */

    public function updateStock(Request $request, $id)
    {
        $request->validate([
            'stock' => 'required|integer|min:0',
        ]);

        $medicine = Medicine::findOrFail($id);
        $medicine->stock = $request->stock;
        $medicine->save();

        return response()->json(['success' => true, 'stock' => $medicine->stock]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $medicine = Medicine::find($id);
        $process = $medicine ? $medicine->delete() : false;

        return $process
            ? redirect()->route('admin.medicine.index')->with('success', [
                'title' => 'Success',
                'message' => 'Data berhasil dihapus'
            ])
            : redirect()->route('admin.medicine.index')->with('error', [
                'title' => 'Error',
                'message' => 'Data gagal dihapus'
            ]);
    }
}
