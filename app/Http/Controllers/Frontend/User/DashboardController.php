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
use App\Models\PropertyType;
use App\Models\Location;
use App\Models\WatchListing;
use App\Models\Notifications;
use Auth;


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
                                              
                        $button = '<form target="_blank"><button formaction="'.url($data->url).'" class="btn text-light table-btn me-4" style="background-color: #4195E1">View</button></form>';
                        $button .= '<input type="hidden" name="hid_id" value="'.$data->id.'">';
                        // $button .= '<button name="delete" id="'.$data->id.'" class="btn text-light table-btn disapprove" style="background-color: #FF2C4B;" data-bs-toggle="modal" data-bs-target="#exampleModal"> Disapprove</button>';

                        return $button;
                    })
                    
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return back();
    }   

    public function account_details(Request $request)
    {        
        // dd($request);   
   

        DB::table('users')->where('id',$request->shadow_id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'display_name' => $request->display_name,
            'preference' => $request->user_type,
            'birth_date' => $request->dob,
            'gender' => $request->gender,
            'marital_status' => $request->marital,
            'city' => $request->city,
            'province' => $request->province,
            'country' => $request->user_countries,
            'postal_code' => $request->postal_code,
            'home_phone' => $request->home_phone,
            'mobile_phone' => $request->mobile_phone
        ]);

              
        return back();    
    }



    public function my_properties()
    {
        $id = Auth::user()->id;
        $properties = Properties::where('user_id',$id)->where('listning_type','free_listning')->orderBy('id','DESC')->get();

        return view('frontend.user.my_properties', ['properties' => $properties]);
    }

    public function my_editProperty($id) {

        $property_type = PropertyType::where('status','=','1')->get();
        $property = Properties::where('id', $id)->first();

        $agent_request = AgentRequest::where('user_id',auth()->user()->id)->first();
        $agent_request_country = $agent_request->country;
        // dd($agent_request_country);

        $countries = Country::where('status',1)->get();

        return view('frontend.user.my_property-edit', [
            'property' => $property,
            'property_type' => $property_type,
            'agent_request_country' => $agent_request_country,
            'countries' => $countries
        ]);
    }

    public function my_updateProperty(Request $request)
    {       
        // dd($request);

        if($request->feature_image == null){
            return back()->with('error', 'Please add Feature Image');
        }

        if($request->multiple_images == null){
            return back()->with('error', 'Please add atleast one image in multiple images section');
        }    

        $str_arr2 = preg_split ("/\,/", $request->multiple_images);
        if(count($str_arr2) > 3){
            return back()->with('error', 'Maximum 3 Images can add in multiple images section');
        }
        
        if($request->lat == null){
            return back()->with('error', 'Property map location must need to point in the map');
        }

        $update = new Properties;

        $update->name=$request->name; 
        $update->property_type=$request->propertyType; 
        $update->description=$request->description;  
        $update->price=$request->price;
        $update->lat=$request->lat;
        $update->long=$request->lng;
        // $update->main_category=$request->category; 
        $update->city=$request->city;
        $update->area=$request->area; 
        $update->country=$request->country;
        $update->feature_image_id=$request->feature_image;
        $update->panaromal_images=$request->panaromal_images;
        $update->image_ids=$request->multiple_images;
        $update->meta_description=$request->meta_description;        
        $update->slug=$request->slug;        
        $update->transaction_type=$request->transaction_type;
        $update->user_id = auth()->user()->id;
        $update->admin_approval='Pending';
        $update->listning_type='free_listning';

        if($request->land_size){
            $update->land_size=$request->land_size;
        }else{}
        if($request->zoning_type){
            $update->zoning_type=$request->zoning_type;
        }else{}
        if($request->number_of_units){
            $update->number_of_units=$request->number_of_units;
        }else{}
        if($request->building_size){
            $update->building_size=$request->building_size;
        }else{}
        if($request->farm_type){
            $update->farm_type=$request->farm_type;
        }else{}
        if($request->building_type){
            $update->building_type=$request->building_type;
        }else{}
        if($request->open_house_only){
            $update->open_house_only=$request->open_house_only;
        }else{}
        if($request->parking_type){
            $update->parking_type=$request->parking_type;
        }else{}
        if($request->beds){
            $update->beds=$request->beds;        
        }else{}
        if($request->baths){
            $update->baths=$request->baths;       
        }else{}

        Properties::whereId($request->hidden_id)->update($update->toArray());       

        return redirect('my_properties');
    }

    public function my_deleteProperty($id) {

        $property = Properties::where('id', $id)->delete();

        return back();
    }

    public function my_pending_status($id) {

        $updatproperty_cancel = new Properties;
        
        $updatproperty_cancel->sold_request = null;
   
        Properties::whereId($id)->update($updatproperty_cancel->toArray());

        return back();
    }

    public function my_sold_status($id) {

        $updatproperty_sold = new Properties;
        
        $updatproperty_sold->sold_request='Pending';
   
        Properties::whereId($id)->update($updatproperty_sold->toArray());

        return back();
    }


    public function user_watch_listing()
    {
        $watch_listing = WatchListing::where('user_id',auth()->user()->id)->get();
        // dd($watch_listing);

        $property = Properties::get();

        return view('frontend.user.watch_listing',[
            'watch_listing' => $watch_listing,
            'property' => $property
        ]);
    }


    public function watch_listingDelete($id) {

        $favourite = WatchListing::where('property_id', $id)->delete();

        return back();
    }

    public function user_notifications()
    {
        $notification = Notifications::where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
        // dd($notification);

        $property = Properties::get();

        return view('frontend.user.notifications',[
            'notification' => $notification,
            'property' => $property
        ]);
    }


    public function user_notifications_status(request $request, $id)
    {
        // dd($request);

        $prop = Notifications::where('id',$id)->first()->url;
        // dd($prop);

        $update = new Notifications;
        
        $update->status = 'Seen';
        $update->user_id = auth()->user()->id;

        Notifications::whereId($id)->update($update->toArray());

        return redirect()->route('frontend.for_sale_single',[$prop]); 
        
    }

    public function user_notifications_status_changed(request $request, $id)
    {
        // dd($request);

        $prop = Notifications::where('id',$id)->first()->url;
        // dd($prop);

        return redirect()->route('frontend.for_sale_single',[$prop]); 
        
    }


}
