<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Properties;
use App\Models\PropertyType;
use App\Models\Country;
use App\Models\Auth\User;
use App\Models\AgentRequest;
use App\Models\Booking;
use App\Models\Favorite;

/**
 * Class ForSaleController.
 */
class ForSaleController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $properties_promoted = Properties::where('promoted','Enabled')->where('main_category','For Sale')->where('admin_approval','Approved')->take(3)->latest()->get();
        // dd($properties_promoted);

        $properties_premium = Properties::where('premium','Enabled')->where('main_category','For Sale')->where('admin_approval','Approved')->get();
        // dd($properties_premium);

        $properties = Properties::where('premium','!=','Enabled')->where('main_category','For Sale')->where('admin_approval','Approved')->paginate(2);

        $all_properties = Properties::where('main_category','For Sale')->where('admin_approval','Approved')->get();
        $count_for_sale = count($all_properties);
        // dd($count_for_sale);

        return view('frontend.for_sale',[
            'properties_promoted' => $properties_promoted,
            'count_for_sale' => $count_for_sale,
            'properties' => $properties,
            'properties_premium' => $properties_premium
        ]);
    }

    public function search(Request $request)
    {
        if($request->search_keyword == null){
            $search = 'key_name';
        }else{
            $search = $request->search_keyword;
        }

        if($request->min_price == null){
            $min_price = 'min_price';
        }else{
            $min_price = $request->min_price;
        }
        if($request->max_price == null){
            $max_price = 'max_price';
        }else{
            $max_price = $request->max_price;
        }
        if($request->transaction_type == null){
            $transaction_type = 'transaction_type';
        }else{
            $transaction_type = $request->transaction_type;
        }
        if($request->property_type == null){
            $property_type = 'property_type';
        }else{
            $property_type = $request->property_type;
        }
        if($request->beds == null){
            $beds = 'beds';
        }else{
            $beds = $request->beds;
        }
        if($request->baths == null){
            $baths = 'baths';
        }else{
            $baths = $request->baths;
        }
        if($request->land_size == null){
            $land_size = 'land_size';
        }else{
            $land_size = $request->land_size;
        }
        if($request->land_size == null){
            $land_size = 'land_size';
        }else{
            $land_size = $request->land_size;
        }
        if($request->listed_since == null){
            $listed_since = 'listed_since';
        }else{
            $listed_since = $request->listed_since;
        }
        if($request->building_type == null){
            $building_type = 'building_type';
        }else{
            $building_type = $request->building_type;
        }
        if($request->open_house == null){
            $open_house = 'open_house';
        }else{
            $open_house = $request->open_house;
        }
        if($request->zoning_type == null){
            $zoning_type = 'zoning_type';
        }else{
            $zoning_type = $request->zoning_type;
        }
        if($request->units == null){
            $units = 'units';
        }else{
            $units = $request->units;
        }
        if($request->building_size == null){
            $building_size = 'building_size';
        }else{
            $building_size = $request->building_size;
        }
        if($request->farm_type == null){
            $farm_type = 'farm_type';
        }else{
            $farm_type = $request->farm_type;
        }
        if($request->parking_type == null){
            $parking_type = 'parking_type';
        }else{
            $parking_type = $request->parking_type;
        }

        if($request->city == null){
            $city = 'city';
        }else{
            $city = $request->city;
        }
        return redirect()->route('frontend.for_sale',[$search,$min_price,$max_price,$transaction_type,$property_type,$beds,$baths,$land_size,$listed_since,$building_type,$open_house,$zoning_type,$units,$building_size,$farm_type,$parking_type,$city]);
    }
   


    public function for_sale($key_name,$min_price,$max_price,$transaction_type,$property_type,$beds,$baths,$land_size,$listed_since,$building_type,$open_house,$zoning_type,$units,$building_size,$farm_type,$parking_type,$city)
    {

        // $property_types = PropertyType::where('status','=','1')->get();
        // $countries = Country::where('status',1)->get();

        $properties = Properties::where('admin_approval', 'Approved');
        // ->where('sold_request',null)
        // ->where('country',get_country_cookie(request())->country_name)
        

        if($key_name != 'key_name'){

            $properties->where('name', 'like', '%' .  $key_name . '%')->orWhere('city', 'like', '%' .  $key_name . '%');

        }

        if($max_price != 'max_price' && $min_price != 'min_price'){
            $properties->where('price', '<=', $max_price)->where('price', '>=', $min_price);
        }
        elseif($max_price != 'max_price' && $min_price == 'min_price'){
            $properties->where('price', '<=', $max_price);
        }
        elseif($max_price == 'max_price' && $min_price != 'min_price'){
            $properties->where('price', '>=', $min_price);
        }



        if($transaction_type != 'transaction_type'){
            $properties->where('transaction_type', $transaction_type);
        }

        
        

        if($property_type != 'property_type'){
            $properties->where('property_type', $property_type);
        }

        if($beds != 'beds'){
            if($beds == 'greater-than-5') {
                $properties->where('beds', '>', 5);
            }
            else {
                $properties->where('beds', $beds);
            }
        }
        

        if($baths != 'baths'){
            if($baths == 'greater-than-5') {
                $properties->where('baths', '>', 5);
            }
            else {
                $properties->where('baths', $baths);
            }
        }

        if($land_size != 'land_size'){
            $properties->where('land_size', $land_size);
        }

        if($listed_since != 'listed_since'){
            $properties->where('created_at', '>', $listed_since);
        }

        if($building_type != 'building_type'){
            $properties->where('building_type', $building_type);
        }

        if($open_house != 'open_house'){
            $properties->where('open_house_only', $open_house);
        }

        if($zoning_type != 'zoning_type'){
            $properties->where('zoning_type', $zoning_type);
        }

        if($units != 'units'){
            $properties->where('number_of_units', $units);
        }

        if($building_size != 'building_size'){
            $properties->where('building_size', $building_size);
        }

        if($farm_type != 'farm_type'){
            $properties->where('farm_type', $farm_type);
        }

        if($parking_type != 'parking_type'){
            $properties->where('parking_type', $parking_type);
        }

        if($city != 'city'){
            $properties->where('city', $city);
        }

        
        $count_for_sale = count($properties->get());

        $fe_properties = $properties->paginate(3);

        $properties_promoted = Properties::where('promoted','Enabled')->where('admin_approval','Approved')->take(3)->latest()->get();

        // dd($properties_promoted);
     
        return view('frontend.for_sale',[
            'properties_promoted' => $properties_promoted,
            'count_for_sale' => $count_for_sale,
            'properties' => $fe_properties,
            'transaction_type' => $transaction_type
        ]);
    }


    public function singleProperty($id)
    {
        $property = Properties::where('id',$id)->first();
        $users = User::where('id',$property->user_id)->first();
        // dd($users);
        
        $agent = AgentRequest::where('user_id',$property->user_id)->first();
        // dd($property);

        $random = Properties::where('admin_approval', 'Approved')->inRandomOrder()->limit(3)->get();

        if(auth()->user())
        {
            $favourite = Favorite::where('property_id',$id)->where('user_id',auth()->user()->id)->first();
        }else{
            $favourite = null;
        }
                
        return view('frontend.for_sale_single',[
            'property' => $property,
            'users' => $users,
            'agent' => $agent,
            'random' => $random,
            'favourite' => $favourite
        ]);
    }
    

    public function contact_agent(Request $request)
    {
        // dd($request);

        $booking = new Booking;
        $booking->first_name = $request->first_name;
        $booking->last_name = $request->last_name;
        $booking->method_of_contact = $request->contact_method;
        $booking->email = $request->email;
        $booking->phone_number = $request->phone_number;
        $booking->message = $request->message;
        $booking->im_resident = $request->im_resident;
        $booking->respond_check = 'Pending';
        $booking->user_id = auth()->user()->id;
        $booking->property_id = $request->property_id;
        $booking->agent_id = $request->agent_id;
        $booking->booking_time = $request->time;
        $booking->status = 'Pending';
        $booking->save();

        session()->flash('message','Thanks!');
        
        return back();

    }


    public function propertyFavourite(Request $request)
    { 
        // dd($request);
        $addfav = new Favorite;

        $user_id = auth()->user()->id;

        $addfav->property_id=$request->prop_hidden_id; 
        $addfav->user_id=$user_id;

        $addfav->save();

        return back();

    }

    public function propertyFavouriteDelete($id)
    {        
        $data = Favorite::findOrFail($id);
        $data->delete();   

        return back();
    }







}
