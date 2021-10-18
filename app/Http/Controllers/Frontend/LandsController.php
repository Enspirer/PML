<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

/**
 * Class LandsController.
 */
class LandsController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.lands');
    }

    public function singleProperty()
    {
        return view('frontend.lands_single');
    }
}
