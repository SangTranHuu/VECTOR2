<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Cart;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function store(Request $request)
    {
        
        if ($request->ajax()) {

        };
    }
}
