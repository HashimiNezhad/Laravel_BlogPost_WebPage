<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the currently authenticated user
        // $user = Auth::user();

        // return view('backend.dashboard.index', ['user' => $user]);
    }
}
