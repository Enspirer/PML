<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\Country;
use App\Models\Auth\User;
use Auth;

class CountryController extends Controller
{
   
    public function index()
    {
        return view('backend.country.index');
    }

    public function create()
    {
        $users = User::get();

        return view('backend.country.create',[
            'users' => $users
        ]);
    }

    public function getdetails(Request $request)
    {
        if($request->ajax())
        {
            $data = Country::get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){                       
                        $button = '<a href="'.route('admin.country.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3 mr-3"><i class="fas fa-edit"></i> Edit </a>';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                        return $button;
                    })

                    ->addColumn('status', function($data){
                        if($data->status == '1'){
                            $status = '<span class="badge badge-success">Enable</span>';
                        }
                        else{
                            $status = '<span class="badge badge-danger">Disable</span>';
                        }   
                        return $status;
                    })
                    
                    ->rawColumns(['action','status'])
                    ->make(true);
        }
        return back();
    }

    public function store(Request $request)
    {        
        // dd($request);

        $request->validate(
            [
                'phone_numbers' => 'required'
            ],
            [
                'phone_numbers.required' => 'Add at least one phone number'
            ]
        );

        $phone_numbers = $request->phone_numbers;

        $final_array = [];
                    
        foreach($phone_numbers as $key => $number){

            $item_group = [                            
                'number' => $number
            ];

            array_push($final_array,$item_group);
        }       

        $user = User::where('email',$request->country_manager)->first();

        $addcountry = new Country;

        $addcountry->country_name=$request->country;
        $addcountry->slug=$request->slug;        
        $addcountry->currency=$request->currency;
        $addcountry->currency_rate=$request->currency_rate;
        $addcountry->country_id=$request->country_id;
        $addcountry->lng=$request->longitude;
        $addcountry->lat=$request->latitude;
        $addcountry->user_id = auth()->user()->id;        
        // $addcountry->country_manager=$user->id;
        $addcountry->status=$request->status;

        $addcountry->phone_numbers=json_encode($final_array);
        $addcountry->opening_hours=$request->opening_hours;
        $addcountry->address=$request->address;

        $addcountry->save();

        return redirect()->route('admin.country.index')->withFlashSuccess('Added Successfully');  
    }

    public function edit($id)
    {
        $country = Country::where('id',$id)->first();
        $users = User::get();
        
        // dd($country);              

        return view('backend.country.edit',[
            'country' => $country,
            'users' => $users
        ]);  
    }


    public function update(Request $request)
    {    
        // dd($request);

        $request->validate(
            [
                'phone_numbers' => 'required'
            ],
            [
                'phone_numbers.required' => 'Add at least one phone number'
            ]
        );

        $phone_numbers = $request->phone_numbers;

        $final_array = [];
                    
        foreach($phone_numbers as $key => $number){

            $item_group = [                            
                'number' => $number
            ];

            array_push($final_array,$item_group);
        }      

        // $user = User::where('email',$request->country_manager)->first();

        $updatcountry = new Country;

        $updatcountry->country_name=$request->country;
        $updatcountry->slug=$request->slug;        
        $updatcountry->currency=$request->currency;
        $updatcountry->currency_rate=$request->currency_rate;
        $updatcountry->country_id=$request->country_id;
        $updatcountry->lng=$request->longitude;
        $updatcountry->lat=$request->latitude;
        $updatcountry->user_id = auth()->user()->id;   
        // $updatcountry->country_manager=$user->id;
        $updatcountry->status=$request->status;

        $updatcountry->phone_numbers=json_encode($final_array);
        $updatcountry->opening_hours=$request->opening_hours;
        $updatcountry->address=$request->address;
   
        Country::whereId($request->hidden_id)->update($updatcountry->toArray());

        return redirect()->route('admin.country.index')->withFlashSuccess('Updated Successfully');                      

    }
    
    public function destroy($id)
    {        
        $data = Country::findOrFail($id);
        $data->delete();   
    }

}
