<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function show(){
        $customer = Customer::all();
        return view('Customer.customer',compact('customer'));
    }
    public function filter(Request $request){
        $start = $request->start;
        $end = $request->end;
        $customer = Customer::whereDate('created_at', '>=', $start)
            ->whereDate('created_at', '<=', $end)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('Customer.customer',compact('customer','start','end'));
    }
    public function destroy($id)
    {
        Customer::destroy($id);
        return response()->json(['message' => 'Status updated successfully']);
    }
}
