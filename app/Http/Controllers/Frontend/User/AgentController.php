<?php

namespace App\Http\Controllers\Frontend\User;

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

class AgentController extends Controller
{
    
    public function index()
    {
        $countries = Country::where('status',1)->get();

        return view('frontend.user.agent',[
            'countries' => $countries
        ]);
    }



    public function store(Request $request)
    {        
        // dd($request);

        if(strlen($request->get('description_msg')) < 500){
            return back()->with('error', 'Minimum length of the characters in Description Message should be 600');
        }
    
        if($request->photo == null){
            return back()->with('error', 'Please Add Agent Photo');
        }

        if($request->logo == null){
            return back()->with('error', 'Please Add Logo');
        }

        if($request->validate == 'NIC'){
            if($request->nic_photo == null){
                return back()->with('error', 'Please Add NIC Photo');
            }
        }
        if($request->validate == 'Passport'){
            if($request->passport_photo == null){
                return back()->with('error', 'Please Add Passport Photo');
            }
        }if($request->validate == 'License'){
            if($request->license_photo == null){
                return back()->with('error', 'Please Add License Photo');
            }
        }

        $addagent = new AgentRequest;

        $addagent->country=$request->country; 
        $addagent->area=$request->area; 
        $addagent->city=$request->city; 
        $addagent->name=$request->name;   
        $addagent->email=$request->email;     
        $addagent->agent_type=$request->agent_type;
        $addagent->company_name=$request->company_name;
        $addagent->company_registration_number=$request->company_reg_no;
        $addagent->photo=$request->photo; 
        $addagent->logo=$request->logo; 
        $addagent->request=$request->request_field;        
        $addagent->tax_number=$request->tax;        
        $addagent->address=$request->address;
        $addagent->telephone=$request->telephone;
        $addagent->description_message=$request->description_msg;
        $addagent->status=$request->admin_approval;
        $addagent->user_id = auth()->user()->id;
        $addagent->status='Pending';
        $addagent->area_manager_approval='Pending';

        $addagent->validation_type=$request->validate;

        if($request->validate == 'NIC'){
            $addagent->nic=$request->nic;
        }elseif($request->validate == 'Passport'){
            $addagent->passport=$request->passport;
        }else{
            $addagent->license=$request->license;
        }

        if($request->validate == 'NIC'){
            $addagent->nic_photo=$request->nic_photo;
        }elseif($request->validate == 'Passport'){
            $addagent->passport_photo=$request->passport_photo;
        }else{
            $addagent->license_photo=$request->license_photo;
        }           
        
        $addagent->save();

        session()->flash('message','Thanks!');

        return back();                      

    }

   
    public function update_agent(Request $request)
    {        
        // dd($request);

        if(strlen($request->get('description_msg')) < 500){
            return back()->with('error', 'Minimum length of the characters in Description Message should be 600');
        }

        if($request->photo == null){
            return back()->with('error', 'Please Add Agent Photo');
        }

        if($request->logo == null){
            return back()->with('error', 'Please Add Logo');
        }

        if($request->validate == 'NIC'){
            if($request->nic_photo == null){
                return back()->with('error', 'Please Add NIC Photo');
            }
        }
        if($request->validate == 'Passport'){
            if($request->passport_photo == null){
                return back()->with('error', 'Please Add Passport Photo');
            }
        }if($request->validate == 'License'){
            if($request->license_photo == null){
                return back()->with('error', 'Please Add License Photo');
            }
        }


        $update = new AgentRequest;

        $update->country=$request->country; 
        $update->area=$request->area; 
        $update->city=$request->city; 
        $update->name=$request->name;   
        $update->email=$request->email;     
        $update->agent_type=$request->agent_type;
        $update->company_name=$request->company_name;
        $update->company_registration_number=$request->company_reg_no;
        $update->photo=$request->photo; 
        $update->logo=$request->logo; 
        $update->cover_photo=$request->cover_photo; 
        $update->request=$request->request_field;        
        $update->tax_number=$request->tax;        
        $update->address=$request->address;
        $update->telephone=$request->telephone;
        $update->description_message=$request->description_msg;
        $update->user_id = auth()->user()->id;

        $update->validation_type=$request->validate;

        if($request->validate == 'NIC'){
            $update->nic=$request->nic;
        }elseif($request->validate == 'Passport'){
            $update->passport=$request->passport;
        }else{
            $update->license=$request->license;
        }

        if($request->validate == 'NIC'){
            $update->nic_photo=$request->nic_photo;
        }elseif($request->validate == 'Passport'){
            $update->passport_photo=$request->passport_photo;
        }else{
            $update->license_photo=$request->license_photo;
        }        
        
        AgentRequest::whereId($request->hidden_id)->update($update->toArray());

        session()->flash('message','Thanks!');

        return back();                      

    }













    public function properties()
    {
        $id = Auth::user()->id;
        $properties = Properties::where('user_id',  $id)->orderBy('id','DESC')->get();

        return view('frontend.user.properties', ['properties' => $properties]);
    }

    public function createProperty()
    {
        $property_type = PropertyType::where('status','=','1')->get();

        $agent_request = AgentRequest::where('user_id',auth()->user()->id)->first();
        $agent_request_country = $agent_request->country;
        // dd($agent_request_country);

        $countries = Country::where('status',1)->get();
      
        return view('frontend.user.create-property',[
            'property_type' => $property_type,
            'agent_request_country' => $agent_request_country,
            'countries' => $countries
        ]);
    }    

    public function editProperty($id) {

        $property_type = PropertyType::where('status','=','1')->get();
        $property = Properties::where('id', $id)->first();

        $agent_request = AgentRequest::where('user_id',auth()->user()->id)->first();
        $agent_request_country = $agent_request->country;
        // dd($agent_request_country);

        $countries = Country::where('status',1)->get();

        return view('frontend.user.property-edit', [
            'property' => $property,
            'property_type' => $property_type,
            'agent_request_country' => $agent_request_country,
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


    public function createPropertyStore(Request $request)
    {
        // dd($request);
        
        if($request->feature_image == null){
            return back()->with('error', 'Please add Feature Image');
        }

        if($request->multiple_images == null){
            return back()->with('error', 'Please add atleast one image in multiple images section');
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
        $addprop->image_ids=$request->multiple_images;
        $addprop->meta_description=$request->meta_description;        
        $addprop->slug=$request->slug;        
        $addprop->transaction_type=$request->transaction_type;
        $addprop->user_id = auth()->user()->id;
        $addprop->admin_approval='Pending';
        $addprop->area_manager_approval='Pending';

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

   
    public function updateProperty(Request $request)
    {       
        // dd($request);

        if($request->feature_image == null){
            return back()->with('error', 'Please add Feature Image');
        }

        if($request->multiple_images == null){
            return back()->with('error', 'Please add atleast one image in multiple images section');
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
        $update->image_ids=$request->multiple_images;
        $update->meta_description=$request->meta_description;        
        $update->slug=$request->slug;        
        $update->transaction_type=$request->transaction_type;
        $update->user_id = auth()->user()->id;
        $update->admin_approval='Pending';
        $update->area_manager_approval='Pending';

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

        return redirect('properties');
    }

    public function deleteProperty($id) {

        $property = Properties::where('id', $id)->delete();

        return back();
    }

    public function pending_status($id) {

        $updatproperty_cancel = new Properties;
        
        $updatproperty_cancel->sold_request = null;
   
        Properties::whereId($id)->update($updatproperty_cancel->toArray());

        return back();
    }

    public function sold_status($id) {

        $updatproperty_sold = new Properties;
        
        $updatproperty_sold->sold_request='Pending';
   
        Properties::whereId($id)->update($updatproperty_sold->toArray());

        return back();
    }

}
