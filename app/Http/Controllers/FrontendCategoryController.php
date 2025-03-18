<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class FrontendCategoryController extends Controller
{
    //
    public function show(Category $category){
        return view('frontend.category', compact('category'));
    }
}
