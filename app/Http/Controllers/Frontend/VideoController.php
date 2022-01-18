<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Category;

class VideoController extends Controller
{
      /**
     * @return \Illuminate\View\View
     */

    public function index(){

        $featured_video = Posts::where('type','youtube')->where('featured','Enabled')->orderBy('order','asc')->where('status','Enabled')->take(5)->get();      
        $random_video = Posts::where('type','youtube')->where('status','Enabled')->inRandomOrder()->limit(5)->get();  
        // dd($featured_video);

        $all_videos = Posts::where('type','youtube')->orderBy('order','asc')->where('status','Enabled')->get();     

        $property_types = PropertyType::where('status','=','1')->get();

        return view('frontend.video-article', [
            'property_types' => $property_types,
            'featured_video' => $featured_video,
            'random_video' => $random_video,
            'all_videos' => $all_videos
        ]);
     }
}
