<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\AgentRequest;

class AgentRequestController extends Controller
{

    public function agent_index()
    {
        return view('backend.agent.index');
    }

    public function agent_create()
    {
        return view('backend.agent.create');
    }

    public function agent_store(Request $request)
    {        

        // dd($request);

        $addagent = new AgentRequest;

        $addagent->city=$request->city; 
        $addagent->name=$request->name;   
        $addagent->email=$request->email;     
        $addagent->agent_type=$request->agent_type;
        $addagent->company_name=$request->company_name;
        $addagent->company_registration_number=$request->company_reg_no;
        $addagent->photo=$request->photo; 
        $addagent->request=$request->request_field;        
        $addagent->tax_number=$request->tax;        
        $addagent->address=$request->address;
        $addagent->telephone=$request->telephone;
        $addagent->description_message=$request->description_msg;
        $addagent->status=$request->admin_approval;
        $addagent->user_id = auth()->user()->id;

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

        return redirect()->route('admin.agent.index')->withFlashSuccess('Added Successfully');                     

    }

    public function agent_getdetails(Request $request)
    {
        if($request->ajax())
        {
            $data = AgentRequest::get();
            return DataTables::of($data)
            
                    ->addColumn('action', function($data){
                       
                        $button = '<a href="'.route('admin.agent.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-edit"></i> Edit </a>';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>';
                        return $button;
                    })
                    
                    ->editColumn('status', function($data){
                        if($data->status == 'Approved'){
                            $status = '<span class="badge badge-success">Approved</span>';
                        }elseif($data->status == 'Disapproved'){
                            $status = '<span class="badge badge-danger">Disapproved</span>';
                        }else{
                            $status = '<span class="badge badge-warning">Pending</span>';
                        }   
                        return $status;
                    })
                    
                    ->rawColumns(['action','status'])
                    ->make(true);
        }
        return back();
    }

    public function agent_edit($id)
    {
        $agent_request = AgentRequest::where('id',$id)->first();
        
        // dd($agent_request);              

        return view('backend.agent.edit',[
            'agent_request' => $agent_request         
        ]);  
    }

    public function agent_update(Request $request)
    {        

        // dd($request);

        $update = new AgentRequest;

        $update->city=$request->city; 
        $update->name=$request->name;   
        $update->email=$request->email;     
        $update->agent_type=$request->agent_type;
        $update->company_name=$request->company_name;
        $update->company_registration_number=$request->company_reg_no;
        $update->photo=$request->photo; 
        $update->request=$request->request_field;        
        $update->tax_number=$request->tax;        
        $update->address=$request->address;
        $update->telephone=$request->telephone;
        $update->description_message=$request->description_msg;
        $update->status=$request->admin_approval;
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

        return redirect()->route('admin.agent.index')->withFlashSuccess('Updated Successfully');                     

    }

    public function agent_destroy($id)
    {        
        $data = AgentRequest::findOrFail($id);
        $data->delete();   
    }

    
    // ******************************************Agent Request*********************************************

    public function index()
    {
        return view('backend.agent_request.index');
    }

    public function getdetails(Request $request)
    {
        if($request->ajax())
        {
            $data = AgentRequest::where('status','=','Pending')->get();
            return DataTables::of($data)
            
                    ->addColumn('action', function($data){
                       
                        $button = '<a href="'.route('admin.agent_request.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-stamp"></i> Approval </a>';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>';
                        return $button;
                    })
                    
                    ->editColumn('status', function($data){
                        if($data->status == 'Approved'){
                            $status = '<span class="badge badge-success">Approved</span>';
                        }elseif($data->status == 'Disapproved'){
                            $status = '<span class="badge badge-danger">Disapproved</span>';
                        }else{
                            $status = '<span class="badge badge-warning">Pending</span>';
                        }   
                        return $status;
                    })
                    
                    ->rawColumns(['action','status'])
                    ->make(true);
        }
        return back();
    }

    public function edit($id)
    {
        $agent_request = AgentRequest::where('id',$id)->first();
        
        // dd($agent_request);              

        return view('backend.agent_request.edit',[
            'agent_request' => $agent_request         
        ]);  
    }

    public function update(Request $request)
    {    
        // $request->validate([
        //     'order' => 'numeric'                
        // ]); 

        $upagent = new AgentRequest;
        
        $upagent->status=$request->status;
   
        AgentRequest::whereId($request->hidden_id)->update($upagent->toArray());

        return redirect()->route('admin.agent_request.index')->withFlashSuccess('Updated Successfully');                      

    }

    public function destroy($id)
    {        
        $data = AgentRequest::findOrFail($id);
        $data->delete();   
    }

}
