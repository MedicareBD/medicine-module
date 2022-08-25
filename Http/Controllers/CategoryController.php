<?php

namespace Modules\Medicine\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;
use Modules\Medicine\DataTables\CategoryDataTable;
use Modules\Medicine\Entities\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:categories-create')->only('create', 'store');
        $this->middleware('permission:categories-read')->only('index');
        $this->middleware('permission:categories-update')->only('edit', 'update');
        $this->middleware('permission:categories-delete')->only('edit', 'destroy');
    }

    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('medicine::categories.index');
    }

    public function create()
    {
        return view('medicine::categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'unique:categories,name'],
            'status' => ['boolean'],
        ]);

        Category::create($validated);

        return response()->json([
            'message' => __('Category Created Successfully'),
            'redirect' => route('admin.categories.index'),
        ]);
    }

    public function edit(Category $category)
    {
        return view('medicine::categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', Rule::unique('categories')->ignore($category->id), 'max:255'],
            'status' => ['boolean'],
        ]);

        $category->update($validated);

        return response()->json([
            'message' => __('Category Updated Successfully'),
            'redirect' => route('admin.categories.index'),
        ]);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([
            'message' => __('Category Deleted Successfully'),
        ]);
    }
}
