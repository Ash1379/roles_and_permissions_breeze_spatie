<?php
namespace App\Http\Controllers;
use App\Models\Import;
use App\Models\Reservoir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ImportController extends Controller
{
    public function index() {
        return Import::with(['company','driver','product'])->get();
    }

    public function store(Request $r) {
        $data = $r->validate([
            'company_id'=>'required',
            'driver_id'=>'nullable',
            'product_id'=>'required',
            'litres'=>'required|numeric',
            'value'=>'nullable|numeric',
            'serial_no'=>'nullable',
            'imported_at'=>'nullable|date',
            'notes'=>'nullable',
        ]);
        return Import::create($data);
    }

    public function show(Import $import) {
        return $import->load(['company','driver','product']);
    }

    public function update(Request $r, Import $import) {
        $import->update($r->all());
        return $import;
    }

    public function destroy(Import $import) {
        $import->delete();
        return response()->noContent();
    }
}
