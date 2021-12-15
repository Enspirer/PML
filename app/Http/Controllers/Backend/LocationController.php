<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Country;
use App\Models\Auth\User;
use DataTables;


class LocationController extends Controller
{
    public function index()
    {
        return view('backend.location.index');
    }

    public function create()
    {
        $countries = Country::where('status',1)->get();
        $users = User::where('confirmed',1)->get();

        return view('backend.location.create',[
            'countries' => $countries,
            'users' => $users
        ]);
    }

    public function getdetails(Request $request)
    {
       
            $data = Location::get();
            return DataTables::of($data)
            
                ->addColumn('action', function($data){
                    $button1 = '<a href="'.route('admin.location.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-edit"></i> Edit </a>';
                    $button2 = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                    return $button1.$button2;
                })
                ->addColumn('country', function($data){
                    $country = Country::where('id',$data->country)->first();
                    if($country == null){
                        $country_name = '<span class="badge badge-danger">Not Set</span>';
                        return $country_name;
                    }
                    elseif($country->status == 0){
                        $country_name = '<span class="badge badge-warning">Country Disabled</span>';
                        return $country_name;
                    }
                    else{
                        $country_name = $country->country_name;
                        return $country_name;
                    }                    
                })
                ->addColumn('status', function($data){
                    if($data->status == 'Enabled'){
                        $status = '<span class="badge badge-success">Enabled</span>';
                    }
                    else{
                        $status = '<span class="badge badge-danger">Disabled</span>';
                    }   
                    return $status;
                })
                ->rawColumns(['action','status','country'])
                ->make(true);
        
        return back();
    }

    public function store(Request $request)
    {        
        // dd($request);                 

        $user = User::where('id',$request->area_manager)->first();

        if($user == null){
            return back()->withErrors('Add Area Manager Correctly');
        }


        $add = new Location;

        $add->country = $request->country;        
        $add->district = $request->district;
        $add->area_manager = $request->area_manager;
        $add->description = $request->description;
        $add->status = $request->status;

        $add->save();

        return redirect()->route('admin.location.index')->withFlashSuccess('Added Successfully');   
        
    }

    public function edit($id)
    {
        $location = Location::where('id',$id)->first(); 
        $countries = Country::where('status',1)->get();
        $users = User::where('confirmed',1)->get();

        return view('backend.location.edit',[
            'location' => $location,
            'countries' => $countries,
            'users' => $users
        ]);
    }

    public function update(Request $request)
    {        
        // dd($request);  
                       
        $user = User::where('id',$request->area_manager)->first();
        // dd($user);

        if($user == null){
            return back()->withErrors('Add Area Manager Correctly');
        }

        $update = new Location;

        $update->country = $request->country;        
        $update->district = $request->district;
        $update->area_manager = $request->area_manager;
        $update->description = $request->description;
        $update->status = $request->status;

        Location::whereId($request->hidden_id)->update($update->toArray());

        return redirect()->route('admin.location.index')->withFlashSuccess('Updated Successfully');
     

    }

    public function destroy($id)
    {
        Location::where('id', $id)->delete(); 
    }
}
