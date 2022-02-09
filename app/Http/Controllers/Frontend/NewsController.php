<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\PropertyNews;

class NewsController extends Controller
{
    public function index() {

        $property_news = PropertyNews::where('status','Enabled')->orderBy('order','asc')->paginate(5);

        $trending_news = PropertyNews::where('status','Enabled')->where('trending','Enabled')->orderBy('order','asc')->get();
        $most_viewed_news = PropertyNews::where('status','Enabled')->where('most_viewed','Enabled')->take(5)->orderBy('order','asc')->get();

        return view('frontend.news',[
            'property_news' => $property_news,
            'trending_news' => $trending_news,
            'most_viewed_news' => $most_viewed_news
        ]);
    }
}
