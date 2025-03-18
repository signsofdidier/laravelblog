<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FrontendPostController extends Controller
{
    //
    public function show(Post $post){
        return view('frontend.post', compact('post'));
    }
}
