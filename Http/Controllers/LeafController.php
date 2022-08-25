<?php

namespace Modules\Medicine\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;
use Modules\Medicine\DataTables\LeafDataTable;
use Modules\Medicine\Entities\Leaf;

class LeafController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:leafs-create')->only('create', 'store');
        $this->middleware('permission:leafs-read')->only('index');
        $this->middleware('permission:leafs-update')->only('edit', 'update');
        $this->middleware('permission:leafs-delete')->only('edit', 'destroy');
    }

    public function index(LeafDataTable $dataTable)
    {
        return $dataTable->render('medicine::leafs.index');
    }

    public function create()
    {
        return view('medicine::leafs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'unique:leafs,name'],
            'status' => ['boolean'],
        ]);

        Leaf::create($validated);

        return response()->json([
            'message' => __('Leaf Created Successfully'),
            'redirect' => route('admin.leafs.index'),
        ]);
    }

    public function edit(Leaf $leaf)
    {
        return view('medicine::leafs.edit', compact('leaf'));
    }

    public function update(Request $request, Leaf $leaf)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', Rule::unique('leafs')->ignore($leaf->id), 'max:255'],
            'status' => ['boolean'],
        ]);

        $leaf->update($validated);

        return response()->json([
            'message' => __('Leaf Updated Successfully'),
            'redirect' => route('admin.leafs.index'),
        ]);
    }

    public function destroy(Leaf $leaf)
    {
        $leaf->delete();

        return response()->json([
            'message' => __('Leaf Deleted Successfully'),
        ]);
    }
}
