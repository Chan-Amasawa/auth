<?php

namespace App\Http\Controllers;

use App\Http\Middleware\isAuthenticated;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        return $this->middleware(isAuthenticated::class);
    }

    public function home()
    {
        return view('dashboard.index');
    }
}
