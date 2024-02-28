<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        // $feedback = Feedback::all();
        $feedback = Feedback::all();
        return view('admin.feedback',compact('feedback'));
    }
}
