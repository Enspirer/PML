<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\Properties;
use App\Models\Country;
use App\Models\PropertyType;
use App\Models\AgentRequest;
use App\Models\Location;
use App\Models\Auth\User;

class FreeListningController extends Controller
{
    
    public function index()
    {
        return view('backend.free_listning.index');
    }

    public function getDetails(Request $request)
    {
        if($request->ajax())
        {
            $data = Properties::where('listning_type','=','free_listning')->get();
            return DataTables::of($data)
            
                    ->addColumn('action', function($data){
                       
                        $button = '<a href="'.route('admin.free_listning.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-edit"></i> Edit </a>';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
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


    public function edit($id)
    {
        $property = Properties::where('id',$id)->first();
        $property_type = PropertyType::where('status',1)->get();
        $countries = Country::where('status',1)->get();

        $agents = AgentRequest::where('status','Approved')->get();
        
        // dd($agents);              

        return view('backend.free_listning.edit', [
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

        return redirect()->route('admin.free_listning.index')->withFlashSuccess('Property Updated Successfully');                     

    }

    public function destroy($id)
    {        
        $data = Properties::findOrFail($id);
        $data->delete();   
    }

  

}
