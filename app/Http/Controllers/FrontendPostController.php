<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FrontendPostController extends Controller
{
    //
    public function show(Post $post){
        $post->load(['comments.parent', 'comments.children','comments.user','comments.user.photo']);
        return view('frontend.post', compact('post'));
    }
}
