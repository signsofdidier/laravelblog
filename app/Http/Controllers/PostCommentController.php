<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|string',
            'post_id' => 'required|exists:posts,id',
            'parent_id' => 'nullable|exists:post_comments,id'
        ]);

        $comment = new PostComment();
        $comment->body = $request->input('body');
        $comment->post_id = $request->input('post_id');
        $comment->parent_id = $request->input('parent_id'); // Parent ID wordt ingesteld als dit een reply is
        $comment->user_id = Auth::id();
        $comment->save();

        return redirect()->back()->with('success', 'Comment successfully posted.');
    }

    /**
     * Display the specified resource.
     */
    public function show($postId)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostComment $postComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PostComment $postComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostComment $postComment)
    {
        //
    }
}
