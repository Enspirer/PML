<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestTwoController extends Controller
{
       /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.testtwo');
    }
}

