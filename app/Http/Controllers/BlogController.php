<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function pending()
    {
        return view('admin.blog_pending');
    }
    public function approved()
    {
        return view('admin.blog_approved');
    }
}
