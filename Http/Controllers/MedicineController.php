<?php

namespace Modules\Medicine\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Medicine\DataTables\MedicineDataTable;
use Modules\Medicine\Entities\Category;
use Modules\Medicine\Entities\Leaf;
use Modules\Medicine\Entities\Medicine;
use Modules\Medicine\Entities\Type;
use Modules\Medicine\Entities\Unit;

class MedicineController extends Controller
{
    public function index(MedicineDataTable $dataTable)
    {
        return $dataTable->render('medicine::medicines.index');
    }

    public function create()
    {
        $categories = Category::whereStatus(1)->get();
        $units = Unit::whereStatus(1)->get();
        $types = Type::whereStatus(1)->get();
        $leafs = Leaf::whereStatus(1)->get();

        return view('medicine::medicines.create', compact('categories', 'units', 'types', 'leafs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bar_code' => ['nullable', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'generic_name' => ['required', 'string', 'max:255'],
            'details' => ['nullable', 'string'],
            'strength' => ['nullable', 'string', 'max:255'],
            'shelf' => ['nullable', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'manufacturer_price' => ['required', 'numeric', 'min:0'],
            'image' => ['nullable', 'image', 'min:0'],
            'status' => ['required', 'boolean'],
            'category' => ['required', 'string', 'exists:categories,id'],
            'unit' => ['required', 'string', 'exists:units,id'],
            'type' => ['required', 'string', 'exists:types,id'],
            'leaf' => ['required', 'string', 'exists:leafs,id'],
            'manufacturer' => ['required', 'string', 'exists:users,id'],
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
