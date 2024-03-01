<?php

namespace App\Http\Controllers;

use App\Models\CustomerDocument;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index(){
        $customer_documents = CustomerDocument::all();
        return view('admin.all_documents',compact('customer_documents'));
        dd($customer_documents);
    }
}
