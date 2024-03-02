<?php

namespace App\Http\Controllers;

use App\Models\CustomerFamily;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function index()
    {   
        $customer_families = CustomerFamily::all();
        return view('admin.all_family',compact('customer_families'));
        dd($customer_families);
    }
}
