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
use App\Models\UserSearch;
use DataTables;

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
        $agent_edit = AgentRequest::where('user_id',auth()->user()->id)->first();
        $user_edit = User::where('id',auth()->user()->id)->first();
        $countries = Country::where('status',1)->get();

        // dd($agent_edit);

        return view('frontend.user.dashboard',[
            'agent_edit' => $agent_edit,
            'user_edit' => $user_edit,
            'countries' => $countries
        ]);
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

    public function agentBookings()
    {
        $agent = AgentRequest::where('user_id', auth()->user()->id)->first();

        // dd($agent->id);

        $bookings = Booking::where('agent_id', $agent->id)->orderBy('id','DESC')->get();

        // dd($bookings);

        return view('frontend.user.agent-bookings',[
            'bookings' => $bookings
        ]);
    }

    public function agentBookingsRespond()
    {
        $booking = DB::table('bookings') ->where('id', '=', request('hid_id'))->update(
            [
                'status' => 'Responded'
            ]
        );

        return back();
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
        $addfeedback->area = $request->area;
        $addfeedback->title = $request->title;
        $addfeedback->message = $request->message;
        $addfeedback->status = 'Pending';
        $addfeedback->user_id = auth()->user()->id;

        $addfeedback->save();

        session()->flash('message','Thanks!');

        return back(); 
        
    }

    public function search_history()
    {
        return view('frontend.user.search_history');
    }


    public function search_history_get_details(Request $request)
    {
        $user_search = UserSearch::where('user_id',auth()->user()->id)->get();

        if($request->ajax())
        {
            return DataTables::of($user_search)
                    ->addColumn('action', function($data){
                                              
                        $button = '<form target="_blank"><button formaction="'.url($data->url).'" class="btn text-light table-btn me-4" style="background-color: #4195E1"> Click Here to Visit the Saved Page </button></form>';
                        $button .= '<input type="hidden" name="hid_id" value="'.$data->id.'">';
                        // $button .= '<button name="delete" id="'.$data->id.'" class="btn text-light table-btn disapprove" style="background-color: #FF2C4B;" data-bs-toggle="modal" data-bs-target="#exampleModal"> Disapprove</button>';

                        return $button;
                    })
                    
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return back();
    }   




}
