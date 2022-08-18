<?php

namespace Modules\Medicine\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;
use Modules\Medicine\DataTables\TypeDataTable;
use Modules\Medicine\Entities\Type;

class TypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:types-create')->only('create', 'store');
        $this->middleware('permission:types-read')->only('index');
        $this->middleware('permission:types-update')->only('edit', 'update');
        $this->middleware('permission:types-delete')->only('edit', 'destroy');
    }

    public function index(TypeDataTable $dataTable)
    {
        return $dataTable->render('medicine::types.index');
    }

    public function create()
    {
        return view('medicine::types.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'unique:types,name'],
            'status' => ['boolean']
        ]);

        Type::create($validated);

        return response()->json([
            'message' => __("Type Created Successfully"),
            'redirect' => route('admin.types.index')
        ]);
    }

    public function edit(Type $type)
    {
        return view('medicine::types.edit', compact('type'));
    }

    public function update(Request $request, Type $type)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', Rule::unique('types')->ignore($type->id), 'max:255'],
            'status' => ['boolean']
        ]);

        $type->update($validated);

        return response()->json([
            'message' => __("Type Updated Successfully"),
            'redirect' => route('admin.types.index')
        ]);
    }

    public function destroy(Type $type)
    {
        $type->delete();

        return response()->json([
            'message' => __("Type Deleted Successfully"),
        ]);
    }
}
