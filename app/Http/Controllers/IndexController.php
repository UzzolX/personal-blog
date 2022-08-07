<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class IndexController extends Controller
{
    public function index()
    {
        $blog = Blog::latest()->paginate(5);
        return view('welcome', compact('blog'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
