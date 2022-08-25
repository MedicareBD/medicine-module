<?php

namespace Modules\Medicine\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;
use Modules\Medicine\DataTables\UnitDataTable;
use Modules\Medicine\Entities\Unit;

class UnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:units-create')->only('create', 'store');
        $this->middleware('permission:units-read')->only('index');
        $this->middleware('permission:units-update')->only('edit', 'update');
        $this->middleware('permission:units-delete')->only('edit', 'destroy');
    }

    public function index(UnitDataTable $dataTable)
    {
        return $dataTable->render('medicine::units.index');
    }

    public function create()
    {
        return view('medicine::units.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'unique:units,name'],
            'status' => ['boolean'],
        ]);

        Unit::create($validated);

        return response()->json([
            'message' => __('Unit Created Successfully'),
            'redirect' => route('admin.units.index'),
        ]);
    }

    public function edit(Unit $unit)
    {
        return view('medicine::units.edit', compact('unit'));
    }

    public function update(Request $request, Unit $unit)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', Rule::unique('units')->ignore($unit->id), 'max:255'],
            'status' => ['boolean'],
        ]);

        $unit->update($validated);

        return response()->json([
            'message' => __('Unit Updated Successfully'),
            'redirect' => route('admin.units.index'),
        ]);
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();

        return response()->json([
            'message' => __('Unit Deleted Successfully'),
        ]);
    }
}
