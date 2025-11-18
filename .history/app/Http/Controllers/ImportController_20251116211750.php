<?php
namespace App\Http\Controllers;
use App\Models\Import as ImportModel;
use App\Models\Reservoir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportController extends Controller
{
    public function store(Request $r)
    {
        $data = $r->validate([
            'company_id'=>'required|exists:companies,id',
            'driver_id'=>'nullable|exists:drivers,id',
            'reservoir_id'=>'nullable|exists:reservoirs,id',
            'product_type'=>'required|in:petrol,diesel,gas,other',
            'litres'=>'required|numeric|min:0.001',
            'value'=>'nullable|numeric',
        ]);

        DB::transaction(function() use ($data) {
            $imp = ImportModel::create($data);
            if (!empty($data['reservoir_id']) && $data['litres']>0) {
                // آپدیت مقدار موجودی درون تراکنش
                $res = Reservoir::lockForUpdate()->find($data['reservoir_id']);
                if ($res) {
                    $res->current_litre += $data['litres'];
                    $res->save();
                }
            }
        });

        return redirect()->route('imports.index')->with('success','Import recorded');
    }
}
