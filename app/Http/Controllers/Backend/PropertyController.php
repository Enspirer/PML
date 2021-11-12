<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\Properties;
use App\Models\Country;
use App\Models\PropertyType;
use App\Models\AgentRequest;

class PropertyController extends Controller
{
    
    public function index()
    {
        return view('backend.property.index');
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

    public function getDetails(Request $request)
    {
        if($request->ajax())
        {
            $data = Properties::get();
            return DataTables::of($data)
            
                    ->addColumn('action', function($data){
                       
                        $button = '<a href="'.route('admin.property.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-edit"></i> Edit </a>';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                        return $button;
                    })
                    ->addColumn('feature_image', function($data){
                        $img = '<img src="'.uploaded_asset($data->feature_image_id).'" style="width: 60%">';
                     
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
                    
                    ->rawColumns(['action','admin_approval','feature_image','promoted','premium'])
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
                'multiple_images' => 'required'
            ],
            [
                'feature_image.required' => 'Please add feature image',
                'multiple_images.required' => 'Please add atleast one image in multiple image section'
            ]
        );        

        $addprop = new Properties;

        $addprop->name=$request->name; 
        $addprop->property_type=$request->propertyType; 
        $addprop->description=$request->description;  
        $addprop->price=$request->price;
        $addprop->main_category=$request->category; 
        $addprop->country=$request->country; 
        $addprop->city=$request->city;
        $addprop->feature_image_id=$request->feature_image;
        $addprop->image_ids=$request->multiple_images;
        $addprop->meta_description=$request->meta_description;        
        $addprop->slug=$request->slug;        
        $addprop->transaction_type=$request->transaction_type;
        $addprop->admin_approval=$request->admin_approval;
        $addprop->promoted=$request->promoted;
        $addprop->premium=$request->premium;
        $addprop->user_id = $request->agent_user_id;

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
        }else{}

        $addprop->save();

        return redirect()->route('admin.property.index')->withFlashSuccess('Property Created Successfully');                     

    }

    public function edit($id)
    {
        $property = Properties::where('id',$id)->first();
        $property_type = PropertyType::where('status',1)->get();
        $countries = Country::where('status',1)->get();

        $agents = AgentRequest::where('status','Approved')->get();
        
        // dd($property_type);              

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
                'multiple_images' => 'required'
            ],
            [
                'feature_image.required' => 'Please add feature image',
                'multiple_images.required' => 'Please add atleast one image in multiple image section'
            ]
        );        

        $update = new Properties;

        $update->name=$request->name; 
        $update->property_type=$request->propertyType; 
        $update->description=$request->description;  
        $update->price=$request->price;
        $update->main_category=$request->category; 
        $update->city=$request->city;
        $update->country=$request->country;
        $update->feature_image_id=$request->feature_image;
        $update->image_ids=$request->multiple_images;
        $update->meta_description=$request->meta_description;        
        $update->slug=$request->slug;        
        $update->transaction_type=$request->transaction_type;
        $update->admin_approval=$request->admin_approval;
        $update->promoted=$request->promoted;
        $update->premium=$request->premium;
        $update->user_id = $request->agent_user_id;


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
