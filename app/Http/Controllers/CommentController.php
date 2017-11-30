<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function generateNonce($nonce)
    {
        return $nonce + 1;
    }

    public function store(Request $request)
    {	
        if (session('nonce') == $request->nonce) {
            $comment = Comment::create([
                'user_id' => auth()->user()->id,
                'content' => $request->content,
                'url' => $request->url
            ]);
            $newNonce = $this->generateNonce(session('nonce'));
            session(['nonce' => $newNonce]);

            return view('comment.store', compact('comment'));
        }   
    }


    public function viewCommentOfUrl(Request $request)
    {
    	$comments = Comment::where('url', $request->url)
            ->orderBy('created_at', 'desc')
            ->get()
            ->take(config('app.load_more'));
    	
    	return view('comment.show', compact('comments'));
    }

    public function loadMore(Request $request)
    {
        $comments = Comment::where('url', $request->url)
            ->orderBy('created_at', 'desc')
            ->get()
            ->splice($request->splice)
            ->take(config('app.load_more'));  

        if (count($comments) == 0) {
            return 1;
        } else {
            return view('comment.show', compact('comments'));
        }
    }
}