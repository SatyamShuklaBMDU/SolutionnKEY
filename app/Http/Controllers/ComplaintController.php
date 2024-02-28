<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
   public function index()
    {    
        $complaint = Complaint::all();
        return view('admin.complaint',compact('complaint'));
    }
}
