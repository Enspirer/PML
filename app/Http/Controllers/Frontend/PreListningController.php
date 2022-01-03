<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\AgentRequest;
use App\Models\PropertyType;
use App\Models\Country;
use App\Models\Properties;
use App\Models\Auth\User;
use Auth;
use App\Models\Booking;
use App\Models\Location;


class PreListningController extends Controller
{
    
    public function index()
    {
        $property_type = PropertyType::where('status','=','1')->get();

        // $agent_request = AgentRequest::where('user_id',auth()->user()->id)->first();
        // $agent_request_country = $agent_request->country;

        // dd($agent_request_country);

        $countries = Country::where('status',1)->get();
      
        return view('frontend.pre_listing',[
            'property_type' => $property_type,
            // 'agent_request_country' => $agent_request_country,
            'countries' => $countries
        ]);
    }    

    

    public function findLocationWithCountryID($id)
    {
        // dd($id);
        $locations = Location::where('country',$id)->get();

        $output_array = [];

        foreach($locations as $key => $location){


            $array_out = [
                'location_country' => $location->country,
                'location_id' => $location->id,
                'location_district' => $location->district
            ];

            array_push($output_array,$array_out);
        }

        // dd($output_array);

        return response()->json($output_array);
    }


    public function store(Request $request)
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
        
        $addprop = new Properties;

        $addprop->name=$request->name; 
        $addprop->property_type=$request->propertyType; 
        $addprop->description=$request->description;  
        $addprop->lat=$request->lat;
        $addprop->long=$request->lng;
        $addprop->price=$request->price;
        // $addprop->main_category=$request->category; 
        $addprop->country=$request->country; 
        $addprop->area=$request->area; 
        $addprop->city=$request->city;
        $addprop->feature_image_id=$request->feature_image;
        $addprop->panaromal_images=$request->panaromal_images;
        $addprop->image_ids=$request->multiple_images;
        $addprop->meta_description=$request->meta_description;        
        $addprop->slug=$request->slug;        
        $addprop->transaction_type=$request->transaction_type;
        $addprop->user_id = auth()->user()->id;
        $addprop->admin_approval='Pending';
        $addprop->listning_type='free_listning';
        $addprop->google_panaroma=$request->google_panaroma;

        if($request->land_size){
            $addprop->land_size=$request->land_size;
        }else{}
        if($request->zoning_type){
            $addprop->zoning_type=$request->zoning_type;
        }else{}
        if($request->number_of_units){
            $addprop->number_of_units=$request->number_of_units;
        }else{}
        if($request->building_size){
            $addprop->building_size=$request->building_size;
        }else{}
        if($request->farm_type){
            $addprop->farm_type=$request->farm_type;
        }else{}
        if($request->building_type){
            $addprop->building_type=$request->building_type;
        }else{}
        if($request->open_house_only){
            $addprop->open_house_only=$request->open_house_only;
        }else{}
        if($request->parking_type){
            $addprop->parking_type=$request->parking_type;
        }else{}
        if($request->beds){
            $addprop->beds=$request->beds;        
        }else{}
        if($request->baths){
            $addprop->baths=$request->baths;       
        }else{

        }

        $meta_tags = $request->name.' '.$request->propertyType.' '.$request->description.' '.$request->price.' '
            .$request->country.' '.$request->area.' '.$request->city.' '.$request->feature_image.' '.$request->multiple_images.' '.
            $request->meta_description.' '.$request->meta_description.' '.$request->slug.' '.$request->transaction_type.' '
            .$request->admin_approval.' '.$request->promoted.' '.$request->premium.' '.$request->agent_user_id.' '. 'land_size'
            .$request->land_size.' zoning_type '.$request->zoning_type.' number of units '.$request->number_of_unit.' building size '
            .$request->building_size.' bed  '.$request->beds.' bath '.$request->building_type;

        $addprop->meta_keywords = $meta_tags;
        $addprop->save();


        session()->flash('message','Thanks!');

        return back();                      

    }

   
    

}
