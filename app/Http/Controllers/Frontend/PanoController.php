<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PanoController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index($image_id)
    {
        return view('frontend.pano',
            [
                'image_id' => $image_id
            ]);
    }
}
