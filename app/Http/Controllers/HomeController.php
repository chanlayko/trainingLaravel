<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = posts::all();
        return view('home',compact('data'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
