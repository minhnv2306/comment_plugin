<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {	
    	$comment = Comment::create([
    		'user_id' => auth()->user()->id,
    		'content' => $request->content,
    		'url' => $request->url
    	]);

    	return view('comment.store', compact('comment'));
    }

    public function viewCommentOfUrl(Request $request)
    {
    	$url = $request->url;
    	$comments = Comment::where('url', $url)->orderBy('created_at', 'desc')->get();
    	
    	return view('comment.show', compact('comments'));
    }
}