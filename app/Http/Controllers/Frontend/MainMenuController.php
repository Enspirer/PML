<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\Category;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class MainMenuController extends Controller
{
    public function homeloan($id) {

        $category = Category::where('id',$id)->first();
        $categories = Category::where('status','Enabled')->orderBy('order','ASC')->get();

        $latest_post = Posts::where('status','=','Enabled')->take(1)->latest()->first();
        $posts = Posts::where('status','=','Enabled')->take(6)->latest()->get();

        $trending_posts = Posts::where('status','=','Enabled')->where('category',$category->id)->where('feature_image','!=',null)->where('type','article')->take(5)->latest()->get();
        // dd($trending_posts);

        $youtube_posts = Posts::where('status','=','Enabled')->where('category',$category->id)->where('type','youtube')->take(5)->latest()->get();
        $default_youtube_posts = Posts::where('status','=','Enabled')->where('category',$category->id)->where('type','youtube')->first();
        
        $article_posts = Posts::where('status','=','Enabled')->where('category',$category->id)->where('type','article')->orderby('order','asc')->get();

        $property_types = PropertyType::where('status','=','1')->get();

        return view('frontend.homeloan',[
            'posts' => $posts,
            'latest_post' => $latest_post,
            'category' => $category,
            'categories' => $categories,
            'trending_posts' => $trending_posts,
            'article_posts' => $article_posts,
            'youtube_posts' => $youtube_posts,
            'default_youtube_posts' => $default_youtube_posts,
            'property_types' => $property_types
        ]);
    }

    

}
