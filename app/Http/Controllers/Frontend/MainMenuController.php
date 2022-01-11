<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainMenuController extends Controller
{
    public function homeloan() {
        return view('frontend.homeloan');
    }
}
