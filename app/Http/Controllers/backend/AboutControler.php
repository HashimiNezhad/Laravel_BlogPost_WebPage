<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\About;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutControler extends Controller
{
    public function index()
    {
        // $aboutvar = DB::table('about')->pluck('title');
        // return $aboutvar;
        // return view('frontend.about.index')
        //     ->with('title', $aboutvar);
        //     ->with('about', 'aboutvar');c

        //Query Builder  second way to return the data from database
        // return DB::table('posts')->where('id', 2)->first();
        // return DB::Table('posts')->Find('2');


    }
}
