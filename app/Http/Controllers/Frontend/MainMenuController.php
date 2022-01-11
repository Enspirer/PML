<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\Category;
use Illuminate\Http\Request;

class MainMenuController extends Controller
{
    public function homeloan() {
        $latest_post = Posts::where('status','=','Enabled')->take(1)->latest()->first();
        $posts = Posts::where('status','=','Enabled')->take(6)->latest()->get();
        return view('frontend.homeloan',[
            'posts' => $posts,
            'latest_post' => $latest_post
        ]);
    }

    

}
