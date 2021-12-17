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

    public function agent_edit()
    {
        $user_id = auth()->user()->id;

        $agent_edit = AgentRequest::where('user_id',$user_id)->first();
        $user_edit = User::where('id',$user_id)->first();

        $countries = Country::where('status',1)->get();

        // dd($agent_edit);
        
        return view('frontend.user.agent_edit',[
            'agent_edit' => $agent_edit,
            'user_edit' => $user_edit,
            'countries' => $countries
        ]);
    }

    public function update_agent(Request $request)
    {        
        // dd($request);

        if(strlen($request->get('description_msg')) < 600){
            return back()->with('error', 'Minimum length of the characters in Description Message should be 600');
        }

        if($request->file('photo'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->photo->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->photo->move(public_path('files/agent_request'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{            
            $detail = AgentRequest::where('id',$request->hidden_id)->first();
            $image_url = $detail->photo;            
        } 

        if($request->file('nic_photo'))
        {            
            $preview_fileName1 = time().'_'.rand(1000,10000).'.'.$request->nic_photo->getClientOriginalExtension();
            $fullURLsPreviewFile1 = $request->nic_photo->move(public_path('files/agent_request'), $preview_fileName1);
            $image_url1 = $preview_fileName1;
        }else{
            $detail = AgentRequest::where('id',$request->hidden_id)->first();
            $image_url1 = $detail->nic_photo;  
        } 
        if($request->file('passport_photo'))
        {            
            $preview_fileName2 = time().'_'.rand(1000,10000).'.'.$request->passport_photo->getClientOriginalExtension();
            $fullURLsPreviewFile2 = $request->passport_photo->move(public_path('files/agent_request'), $preview_fileName2);
            $image_url2 = $preview_fileName2;
        }else{
            $detail = AgentRequest::where('id',$request->hidden_id)->first();
            $image_url2 = $detail->passport_photo; 
        } 
        if($request->file('license_photo'))
        {            
            $preview_fileName3 = time().'_'.rand(1000,10000).'.'.$request->license_photo->getClientOriginalExtension();
            $fullURLsPreviewFile3 = $request->license_photo->move(public_path('files/agent_request'), $preview_fileName3);
            $image_url3 = $preview_fileName3;
        }else{
            $detail = AgentRequest::where('id',$request->hidden_id)->first();
            $image_url3 = $detail->license_photo; 
        } 
       

        if($request->file('cover_photo'))
        {            
            $preview_fileName4 = time().'_'.rand(1000,10000).'.'.$request->cover_photo->getClientOriginalExtension();
            $fullURLsPreviewFile4 = $request->cover_photo->move(public_path('files/agent_request'), $preview_fileName4);
            $image_url4 = $preview_fileName4;
        }
        else{    
            $details = AgentRequest::where('id',$request->hidden_id)->first();        
            $image_url4 = $details->cover_photo; 
        } 


        $edit_agent = new AgentRequest;

        $edit_agent->country=$request->country;
        $edit_agent->city=$request->city; 
        $edit_agent->name=$request->name;        
        $edit_agent->agent_type=$request->agent_type;
        $edit_agent->company_name=$request->company_name;
        $edit_agent->company_registration_number=$request->company_reg_no;
        $edit_agent->photo=$image_url;
        $edit_agent->email=$request->email; 
        $edit_agent->request=$request->request_field;        
        $edit_agent->tax_number=$request->tax;        
        $edit_agent->address=$request->address;
        $edit_agent->telephone=$request->telephone;
        $edit_agent->description_message=$request->description_msg;
        // $edit_agent->status='Pending';
        // $edit_agent->country_manager_approval = 'Pending';
        $edit_agent->user_id = auth()->user()->id;

        $edit_agent->cover_photo=$image_url4; 

        $edit_agent->validation_type=$request->validate;

        if($request->validate == 'NIC'){
            $edit_agent->nic=$request->nic;
        }elseif($request->validate == 'Passport'){
            $edit_agent->passport=$request->passport;
        }else{
            $edit_agent->license=$request->license;
        }

        if($request->validate == 'NIC'){
            $edit_agent->nic_photo=$image_url1;
        }elseif($request->validate == 'Passport'){
            $edit_agent->passport_photo=$image_url2;
        }else{
            $edit_agent->license_photo=$image_url3;
        }        
        
        AgentRequest::whereId($request->hidden_id)->update($edit_agent->toArray());

        session()->flash('message','Thanks!');

        return back();                      

    }




}
