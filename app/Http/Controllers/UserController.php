<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        //for Last login function


        $user = Auth::user();
        $userCount = DB::table('users')->count();
        $totalPosts = DB::table('posts')->count();
        $trashedPosts = Post::onlyTrashed()->count();

        $trashedPercentage = round(($trashedPosts / $totalPosts) * 100);

        return view('backend.dashboard.index')
            ->with('user', $user)
            ->with('users', User::all())
            ->with('userCount', $userCount)
            ->with('totalPosts', $totalPosts)
            ->with('trashedPosts', $trashedPercentage);
    }
}
