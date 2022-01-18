<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\Posts;
use App\Models\Category;

class ArticleController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */

    public function index($id)
    {
        $post_details = Posts::where('id',$id)->first();      
        $trending_posts = Posts::where('id','!=',$id)->where('type','article')->orderBy('order','asc')->where('status','Enabled')->take(5)->get();      
        $random_posts = Posts::where('id','!=',$id)->where('type','article')->where('status','Enabled')->inRandomOrder()->limit(5)->get();  
        // dd($random_posts);    
        $category = Category::where('id',$post_details->category)->first();
        $property_types = PropertyType::where('status','=','1')->get();

        return view('frontend.article',[
            'post_details' => $post_details,
            'category' => $category,
            'trending_posts' => $trending_posts,
            'property_types' => $property_types,
            'random_posts' => $random_posts
        ]);
    }
}
