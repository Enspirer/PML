<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Posts;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $latest_post = Posts::where('status','=','Enabled')->take(1)->latest()->first();
        $posts = Posts::where('status','=','Enabled')->take(6)->latest()->get();

        return view('frontend.index',[
            'posts' => $posts,
            'latest_post' => $latest_post
        ]);
    }
}
