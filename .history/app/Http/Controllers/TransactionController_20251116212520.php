<?php
namespace App\Http\Controllers;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){ $items = Transaction::with(['customer','sale','import'])->latest()->paginate(30); return view('accountant.transactions.index', compact('items')); }

    public function create(){ return view('accountant.transactions.create'); }

    public function store(Request $r){
        $data = $r->validate([
            'customer_id'=>'nullable|exists:customers,id',
            'sale_id'=>'nullable|exists:sales,id',
            'import_id'=>'nullable|exists:imports,id',
            'amount'=>'required|numeric',
            'type'=>'required|in:in,out',
        ]);
        Transaction::create($data);
        return redirect()->route('accountant.transactions')->with('success','Transaction recorded');
    }
}
