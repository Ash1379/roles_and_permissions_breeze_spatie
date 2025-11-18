<?php
namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){ $items = Customer::withCount(['lends','payments'])->paginate(25); return view('customers.index', compact('items')); }
    public function create(){ return view('customers.create'); }
    public function store(Request $r){
        $data = $r->validate(['first_name'=>'required|string','last_name'=>'nullable|string','phone'=>'nullable|string']);
        Customer::create($data);
        return redirect()->route('customers.index')->with('success','Customer created');
    }
    // edit/update/destroy ähnlich
}
