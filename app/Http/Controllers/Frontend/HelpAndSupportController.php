<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelpAndSupportController extends Controller
{
    public function index()
    {
        return view('frontend.help_and_support');
    }
}
