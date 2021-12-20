<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\AgentRequest;
use App\Models\Country;
use App\Models\Location;
use App\Models\Properties;
use App\Models\PropertyType;
use App\Models\Auth\User;
use App\Models\Feedback;
use Auth;
use DataTables;

class AreaManagementController extends Controller
{
    public function propertyApproval() 
    {
        return view('frontend.user.property-approval');
    }

    public function getPropertyApproval(Request $request)
    {

        $user_id = auth()->user()->id;

        $area_manager = Location::where('area_manager',$user_id)->where('status','Enabled')->first();

        $properties = Properties::where('country', $area_manager->country)->where('area',$area_manager->id)->orderBy('id','DESC')->get();


        if($request->ajax())
        {
            return DataTables::of($properties)
                    ->addColumn('action', function($data){
                       
                       
                        $button = '<a href="'.route('frontend.user.single-property-approval', $data->id).'" name="edit" id="'.$data->id.'" class="btn text-light table-btn me-4" style="background-color: #4195E1"> View </a>';
                        $button .= '<input type="hidden" name="hid_id" value="'.$data->id.'">';
                        // $button .= '<button name="delete" id="'.$data->id.'" class="btn text-light table-btn disapprove" style="background-color: #FF2C4B;" data-bs-toggle="modal" data-bs-target="#exampleModal"> Disapprove</button>';

                        return $button;
                    })
                    
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return back();
    }    

    public function singlePropertyApproval($id) 
    {

        $single_approval = Properties::where('id', $id)->first();

        $property_type = PropertyType::where('id', $single_approval->property_type)->first();

        $agent_details = AgentRequest::where('user_id', $single_approval->user_id)->first();        


        return view('frontend.user.single-property-approval', [
            'single_approval'=> $single_approval,
            'property_type' => $property_type,
            'agent_details' => $agent_details
        ]);
    }    

    public function singlePropertyApproved() 
    {

        $action = request('action');

        $property = DB::table('properties') ->where('id', '=', request('hid_id'))->update(
            [
                'area_manager_approval' => $action
            ]
        );

        return redirect('/area-management-property-approval');
    }   


    public function agentApproval() 
    {
        return view('frontend.user.agent-approval');
    }

    public function getAgentApproval(Request $request) {

        $user_id = auth()->user()->id;
        
        $area_manager = Location::where('area_manager',$user_id)->where('status','Enabled')->first();

        $agent_request = AgentRequest::where('country',$area_manager->country)->where('area',$area_manager->id)->orderBy('id','DESC')->get();
    
        if($request->ajax())
        {
            return DataTables::of($agent_request)
                    ->addColumn('action', function($data){
                       
                       
                        $button = '<a href="'.route('frontend.user.single-agent-approval', $data->id).'" name="edit" id="'.$data->id.'" class="btn text-light table-btn me-4" style="background-color: #4195E1"> View </a>';
                        $button .= '<input type="hidden" name="hid_id" value="'.$data->id.'">';
                        // $button .= '<button name="delete" id="'.$data->id.'" class="btn text-light table-btn disapprove" style="background-color: #FF2C4B;" data-bs-toggle="modal" data-bs-target="#exampleModal"> Disapprove</button>';

                        return $button;
                    })
                    
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return back();
    }


    public function getAgentApprovalUpdate(Request $request) {

        $property = DB::table('agent_requests') ->where('id', $request->hid_id)->update(
            [
                'area_manager_approval' => 'Disapproved'
            ]
        );

        return back();
    }
      

    public function agentApprovalDelete($id)
    {        
        // dd($id);
        $data = AgentRequest::findOrFail($id);
        $data->delete();   

        return back();
    }

    public function singleAgentApproval($id) {

        $single_agent_request = AgentRequest::where('id',$id)->first();
        // dd($single_agent_request);
        return view('frontend.user.single-agent-approval',[
            'single_agent_request' => $single_agent_request
        ]);
    }

    public function singleAgentApprovalUpdate(Request $request)
    {        
        // dd($request);
       
        $update = new AgentRequest;

        $update->area_manager_approval=$request->action;        
        
        AgentRequest::whereId($request->hidden_id)->update($update->toArray());

        return redirect('/area-management-agent-approval');
    }
   



}
