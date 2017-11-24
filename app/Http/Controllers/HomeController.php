<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url = config('app.url_default');
        $comments = Comment::where('url', $url)->orderBy('created_at', 'desc')->get();
        
        return view('home', compact('comments', 'url'));
    }
}
