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
use App\Models\Feedback;


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

    public function myBookings()
    {
        $bookings = Booking::where('user_id',auth()->user()->id)->orderBy('id','DESC')->get();

        return view('frontend.user.my-bookings',[
            'bookings' => $bookings
        ]);
    }

    public function feedback()
    {
        $countries = Country::where('status',1)->get();

        $user_id = auth()->user()->id;
        $user_details = User::where('id',$user_id)->first();

        return view('frontend.user.feedback',[
            'countries' => $countries,
            'user_details' => $user_details
        ]);
    }

    public function feedbackStore(request $request)
    {
        // dd($request);

        $addfeedback = new Feedback;

        $addfeedback->name = $request->name;
        $addfeedback->country = $request->country;
        $addfeedback->title = $request->title;
        $addfeedback->message = $request->message;
        $addfeedback->status = 'Pending';
        $addfeedback->user_id = auth()->user()->id;

        $addfeedback->save();

        session()->flash('message','Thanks!');

        return back(); 
        
    }




}
