<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\NearLocation;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\Properties;
use App\Models\Country;
use App\Models\PropertyType;
use App\Models\AgentRequest;
use App\Models\Location;
use App\Models\Auth\User;

class PropertyController extends Controller
{

    public function index()
    {
        return view('backend.property.index');
    }

    public function property_nearby_generate(Request $request)
    {
        $propertDetails = Properties::where('id',$request->property_id)->first();

        $result_status = NearLocation::nearlocation($propertDetails->lat,$propertDetails->long,$propertDetails->id,$request->type);

        if($result_status){
            return back()->withFlashSuccess('Added Successfully');   
        }else{
            return back()->withErrors('Something Went Wrong!');   
        }
        
    }



    public function property_nearby_index($id){

        $propertDetails = Properties::where('id',$id)->first();
        $nearPlaces = NearLocation::where('property_id',$id)->get();

//        $result_status = NearLocation::nearlocation($propertDetails->lat,$propertDetails->long,$id,'school');

        return view('backend.property_nearby.index',[
            'property_details' => $propertDetails,
            'near_places' => $nearPlaces
        ]);
    }



    public function create()
    {
        $property_type = PropertyType::where('status',1)->get();
        $countries = Country::where('status',1)->get();

        $agents = AgentRequest::where('status','Approved')->get();

        return view('backend.property.create',[
            'property_type' => $property_type,
            'countries' => $countries,
            'agents' => $agents
        ]);
    }

    public function findLocWithCountryID($id)
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

    public function getDetails(Request $request)
    {
        if($request->ajax())
        {
            $data = Properties::where('listning_type','=','agent_listning')->where('sold_request',null)->get();
            return DataTables::of($data)
            
                    ->addColumn('action', function($data){
                       
                        $button = '<a href="'.route('admin.property.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-edit"></i> Edit </a>';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                        $button .= '<a href="'.route('admin.property.property_nearby_index',$data->id).'" style="margin-left: 10px;" class="btn btn-primary btn-sm"><i class="fas fa-building"></i> Near Places</button>';
                        return $button;
                    })
                    ->addColumn('feature_image', function($data){
                        $img = '<img src="'.uploaded_asset($data->feature_image_id).'" style="width: 100%">';
                     
                        return $img;
                    })   
                    ->addColumn('promoted', function($data){
                        if($data->promoted == 'Enabled'){
                            $status = '<span class="badge badge-success">Promoted</span>';
                        }else{
                            $status = '<span class="badge badge-warning">Disabled</span>';
                        }   
                        return $status;
                    })
                    ->addColumn('premium', function($data){
                        if($data->premium == 'Enabled'){
                            $status = '<span class="badge badge-success">Premium</span>';
                        }else{
                            $status = '<span class="badge badge-warning">Disabled</span>';
                        }   
                        return $status;
                    })  
                    ->addColumn('featured', function($data){
                        if($data->featured == 'Enabled'){
                            $status = '<span class="badge badge-success">Featured</span>';
                        }else{
                            $status = '<span class="badge badge-warning">Disabled</span>';
                        }   
                        return $status;
                    })                 
                    ->addColumn('admin_approval', function($data){
                        if($data->admin_approval == 'Approved'){
                            $status = '<span class="badge badge-success">Approved</span>';
                        }elseif($data->admin_approval == 'Disapproved'){
                            $status = '<span class="badge badge-danger">Disapproved</span>';
                        }else{
                            $status = '<span class="badge badge-warning">Pending</span>';
                        }   
                        return $status;
                    })
                    
                    ->rawColumns(['action','admin_approval','feature_image','promoted','premium','featured'])
                    ->make(true);
        }
        return back();
    }

    public function store(Request $request)
    {       
        // dd($request);

        $request->validate(
            [
                'feature_image' => 'required',
                'multiple_images' => 'required',
                'lat' => 'required'
            ],
            [
                'feature_image.required' => 'Please add feature image',
                'multiple_images.required' => 'Please add atleast one image in multiple images section',
                'lat.required' => 'Property map location must need to point in the map'
            ]
        );        

        $addprop = new Properties;

        $addprop->name=$request->name; 
        $addprop->property_type=$request->propertyType; 
        $addprop->description=$request->description;  
        $addprop->lat=$request->lat;
        $addprop->long=$request->lng;
        // $addprop->price=$request->price;
        // $addprop->main_category=$request->category; 
        $addprop->country=$request->country; 
        $addprop->area=$request->area; 
        $addprop->city=$request->city;
        $addprop->feature_image_id=$request->feature_image;
        $addprop->image_ids=$request->multiple_images;
        $addprop->panaromal_images=$request->panaromal_images;
        $addprop->google_panaroma=$request->google_panaroma;
        $addprop->meta_description=$request->meta_description;        
        $addprop->slug=$request->slug;        
        $addprop->transaction_type=$request->transaction_type;
        $addprop->admin_approval=$request->admin_approval;
        $addprop->promoted=$request->promoted;
        $addprop->premium=$request->premium;
        $addprop->featured=$request->featured;
        $addprop->user_id = $request->agent_user_id;
        $addprop->panaromal_status = $request->panaromal_status;
        $addprop->google_panaroma = $request->google_panaroma;
        $addprop->panaromal_images = $request->panaromal_images;
        $addprop->states=$request->states;
        $addprop->postal_code=$request->postal_code;
        $addprop->address_one=$request->address_line_one;
        $addprop->address_two=$request->address_line_two;
        $addprop->video=$request->video;
        $addprop->flow_plan=$request->flow_plan;
        $addprop->listning_type='agent_listning';

        $addprop->price_options=$request->validate;

        if($request->validate == 'Full'){
            $addprop->capacity=$request->full_property;
        }elseif($request->validate == 'Perches'){
            $addprop->capacity=$request->perches;
        }
        elseif($request->validate == 'Acres'){
            $addprop->capacity=$request->acres;
        }else{
            $addprop->capacity=$request->hectares;
        }

        if($request->validate == 'Full'){
            $addprop->price=$request->price_full_property;
        }elseif($request->validate == 'Perches'){
            $addprop->price=$request->price_perches;
        }
        elseif($request->validate == 'Acres'){
            $addprop->price=$request->price_acres;
        }else{
            $addprop->price=$request->price_hectares;
        }


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

        return redirect()->route('admin.property.index')->withFlashSuccess('Property Created Successfully');                     

    }

    public function edit($id)
    {
        $property = Properties::where('id',$id)->first();
        $property_type = PropertyType::where('status',1)->get();
        $countries = Country::where('status',1)->get();

        $agents = AgentRequest::where('status','Approved')->get();
        
        // dd($agents);              

        return view('backend.property.edit', [
            'property' => $property,
            'property_type' => $property_type,
            'countries' => $countries,
            'agents' => $agents
        ]);  
    }

    public function update(Request $request)
    {       
        // dd($request);

        $request->validate(
            [
                'feature_image' => 'required',
                'multiple_images' => 'required',
                'lat' => 'required'
            ],
            [
                'feature_image.required' => 'Please add feature image',
                'multiple_images.required' => 'Please add atleast one image in multiple images section',
                'lat.required' => 'Property map location must need to point in the map'
            ]
        );        

        $agent_request = AgentRequest::where('user_id',$request->agent_user_id)->first();
        // dd($agent_request);
        $user_id = User::where('id',$agent_request->user_id)->first();

        $update = new Properties;

        $update->name=$request->name; 
        $update->property_type=$request->propertyType; 
        $update->description=$request->description;  
        $update->lat=$request->lat;
        $update->long=$request->lng;
        // $update->price=$request->price;
        // $update->main_category=$request->category; 
        $update->city=$request->city;
        $update->area=$request->area; 
        $update->country=$request->country;
        $update->feature_image_id=$request->feature_image;
        $update->image_ids=$request->multiple_images;
        $update->panaromal_images=$request->panaromal_images;
        $update->google_panaroma=$request->google_panaroma;
        $update->meta_description=$request->meta_description;        
        $update->slug=$request->slug;        
        $update->transaction_type=$request->transaction_type;
        $update->admin_approval=$request->admin_approval;
        $update->promoted=$request->promoted;
        $update->premium=$request->premium;
        $update->featured=$request->featured;
        $update->user_id = $user_id->id;
        $update->panaromal_status = $request->panaromal_status;
        $update->google_panaroma = $request->google_panaroma;
        $update->panaromal_images = $request->panaromal_images;
        $update->states=$request->states;
        $update->postal_code=$request->postal_code;
        $update->address_one=$request->address_line_one;
        $update->address_two=$request->address_line_two;
        $update->video=$request->video;
        $update->flow_plan=$request->flow_plan;
        $update->listning_type='agent_listning';

        $update->price_options=$request->validate;

        if($request->validate == 'Full'){
            $update->capacity=$request->full_property;
        }elseif($request->validate == 'Perches'){
            $update->capacity=$request->perches;
        }
        elseif($request->validate == 'Acres'){
            $update->capacity=$request->acres;
        }else{
            $update->capacity=$request->hectares;
        }

        if($request->validate == 'Full'){
            $update->price=$request->price_full_property;
        }elseif($request->validate == 'Perches'){
            $update->price=$request->price_perches;
        }
        elseif($request->validate == 'Acres'){
            $update->price=$request->price_acres;
        }else{
            $update->price=$request->price_hectares;
        }


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

        return redirect()->route('admin.property.index')->withFlashSuccess('Property Updated Successfully');                     

    }

    public function destroy($id)
    {        
        $data = Properties::findOrFail($id);
        $data->delete();   
    }

    public function property_type($id)
    {
        $property_type = PropertyType::where('status','=','1')->where('id',$id)->get();

        $final_out = [];

        foreach($property_type as $key => $pro_type){

            $array = [
                'id' => $pro_type->id,
                'property_type_name' => $pro_type->property_type_name,
                'property_description' => $pro_type->property_description,
                'activated_fields' => json_decode($pro_type->activated_fields)
                
            ];

            array_push($final_out,$array);

        }

        // dd($final_out);

        return json_encode($final_out);
    }


}
