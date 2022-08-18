<?php

namespace Modules\Medicine\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Core\Helpers\HasUpload;
use Modules\Medicine\DataTables\MedicineDataTable;
use Modules\Medicine\Entities\Category;
use Modules\Medicine\Entities\Leaf;
use Modules\Medicine\Entities\Medicine;
use Modules\Medicine\Entities\Type;
use Modules\Medicine\Entities\Unit;
use Modules\Medicine\Http\Requests\StoreMedicineReuqest;

class MedicineController extends Controller
{
    use HasUpload;

    public function index(MedicineDataTable $dataTable)
    {
        return $dataTable->render('medicine::medicines.index');
    }

    public function store(StoreMedicineReuqest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $image = $this->upload($request->file('image'));
        }

        Medicine::create([
            "bar_code" => $validated['bar_code'],
            "name" => $validated['name'],
            "generic_name" => $validated['generic_name'],
            "details" => $validated['details'],
            "strength" => $validated['strength'],
            "shelf" => $validated['shelf'],
            "price" => $validated['price'],
            "box_price" => 0,
            "manufacturer_price" => $validated['manufacturer_price'],
            "image" => $image ?? 'images/pill.png',
            "vat" => $validated['vat'],
            "igta" => $validated['igta'],
            "status" => $validated['status'],
            "category_id" => $validated['category'],
            "unit_id" => $validated['unit'],
            "type_id" => $validated['type'],
            "leaf_id" => $validated['leaf'],
            "manufacturer_id" => $validated['manufacturer'],
            "added_by" => Auth::id(),
        ]);

        return response()->json([
            'message' => __("Medicine Created Successfully"),
            'redirect' => route('admin.medicines.index')
        ]);
    }

    public function create()
    {
        $categories = Category::whereStatus(1)->get();
        $units = Unit::whereStatus(1)->get();
        $types = Type::whereStatus(1)->get();
        $leafs = Leaf::whereStatus(1)->get();

        return view('medicine::medicines.create', compact('categories', 'units', 'types', 'leafs'));
    }

    public function show(Medicine $medicine)
    {
        return view('medicine::medicines.show', compact('medicine'))->render();
    }

    public function showQrCoders(Medicine $medicine)
    {
        if (!$medicine->bar_code){
            return response()->json([
                'message' => __("Bar/QR Code Not Found")
            ], 404);
        }
        return view('medicine::medicines.qr-code', compact('medicine'))->render();
    }

    public function showBarCoders(Medicine $medicine)
    {
        if (!$medicine->bar_code){
            return response()->json([
                'message' => __("Bar/QR Code Not Found")
            ], 404);
        }

        $barcode = barcode($medicine->id, $medicine->bar_code);
        return view('medicine::medicines.bar-code', compact('medicine', 'barcode'))->render();
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

    public function searchManufacturer(Request $request)
    {
        $search = $request->get('search');

        if (!is_null($search)) {
            $users = User::role('Manufacturer')
                ->orderby('name')
                ->select(['id', 'name as text', 'avatar'])
                ->where('name', 'like', '%' . $search . '%')
                ->paginate(20);
        } else {
            return response()->json();
        }

        return response()->json($users);
    }
}
