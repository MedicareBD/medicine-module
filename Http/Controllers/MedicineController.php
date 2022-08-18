<?php

namespace Modules\Medicine\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Medicine\DataTables\MedicineDataTable;
use Modules\Medicine\Entities\Medicine;

class MedicineController extends Controller
{
    public function index(MedicineDataTable $dataTable)
    {
        return $dataTable->render('medicine::medicines.index');
    }

    public function create()
    {
        return view('medicine::create');
    }

    public function store(Request $request)
    {
        $request->validate([
            //
        ]);

        return response()->json([
            'message' => __("Medicine Created Successfully"),
            'redirect' => route('admin.medicine.index')
        ]);
    }

    public function show(Medicine $medicine)
    {
        return view('medicine::show', compact('medicine'));
    }

    public function edit(Medicine $medicine)
    {
        return view('medicine::edit', compact('medicine'));
    }

    public function update(Request $request, Medicine $medicine)
    {
        $request->validate([
            //
        ]);

        $medicine->update([
            //
        ]);

        return response()->json([
            'message' => __("Medicine Updated Successfully"),
            'redirect' => route('admin.medicine.index')
        ]);
    }

    public function destroy(Medicine $medicine)
    {
        $medicine->delete();

        return response()->json([
            'message' => __("Medicine Deleted Successfully"),
        ]);
    }
}
