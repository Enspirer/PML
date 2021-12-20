<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\Properties;
use App\Models\PropertyType;
use App\Models\AgentRequest;


class PropertyHistoryController extends Controller
{
    public function index()
    {
        return view('backend.sold_properties.index');
    }

    public function getdetails(Request $request)
    {
        if($request->ajax())
        {
            $data = Properties::where('admin_approval','=','Approved')->where('sold_request','!=',null)->get();
            return DataTables::of($data)
            
                    ->addColumn('action', function($data){
                       
                        $button = '<a href="'.route('admin.sold_properties.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-edit"></i> Approval </a>';
                        // $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                        return $button;
                    })
                    
                    ->editColumn('sold_request', function($data){
                        if($data->sold_request == 'Sold'){
                            $status = '<span class="badge badge-success">Sold</span>';
                        }else{
                            $status = '<span class="badge badge-warning">Pending</span>';
                        }   
                        return $status;
                    })
                    
                    ->rawColumns(['action','sold_request'])
                    ->make(true);
        }
        return back();
    }

    public function edit($id)
    {
        $property = Properties::where('id',$id)->first();

        $property_type = PropertyType::where('id', $property->property_type)->first();

        $agent_details = AgentRequest::where('user_id', $property->user_id)->first(); 
        // dd($listing_history);

        return view('backend.sold_properties.edit', [
            'property' => $property,
            'property_type' => $property_type,
            'agent_details' => $agent_details
        ]);  
    }

    public function update(Request $request)
    {    
        
        $updatproperty = new Properties;
        
        $updatproperty->sold_request=$request->sold_request;
   
        Properties::whereId($request->hidden_id)->update($updatproperty->toArray());
       

        return redirect()->route('admin.sold_properties.index')->withFlashSuccess('Updated Successfully');                      

    }

    
}
