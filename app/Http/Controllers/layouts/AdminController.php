<?php

namespace App\Http\Controllers\layouts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('layouts.index');
    }
}
