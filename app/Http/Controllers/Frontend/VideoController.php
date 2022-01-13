<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class VideoController extends Controller
{
      /**
     * @return \Illuminate\View\View
     */

    public function index(){

        $property_types = PropertyType::where('status','=','1')->get();

        return view('frontend.video-article', [
            'property_types' => $property_types
        ]);
     }
}
