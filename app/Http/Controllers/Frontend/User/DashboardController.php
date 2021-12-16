<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\AgentRequest;
use App\Models\Auth\User;
use App\Models\Properties;
use App\Models\Favorite; 
use App\Models\Country;
use App\Models\Booking;


/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.user.dashboard');
    }

    public function account_dashboard()
    {
        return view('frontend.user.account_dashboard');
    }

    public function favourites()
    {
        $favourite = Favorite::where('user_id',auth()->user()->id)->get();
        // dd($favourite);

        $property = Properties::get();
        // dd($property);       

        return view('frontend.user.favourites',[
            'favourite' => $favourite,
            'property' => $property
        ]);
    }


    public function favouritesDelete($id) {

        $favourite = Favorite::where('property_id', $id)->delete();

        return back();
    }


    
}
