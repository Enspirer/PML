<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostAdController extends Controller
{
     /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.add-property');
    }
}
