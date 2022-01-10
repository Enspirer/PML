<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    
    public function tips_for_buyers()
    {
        return view('frontend.tips_for_buyers');
    }

    public function tips_for_sellers()
    {
        return view('frontend.tips_for_sellers');
    }

    public function commercial_resources()
    {
        return view('frontend.commercial_resources');
    }

    public function marketing_services()
    {
        return view('frontend.marketing_services');
    }

}
