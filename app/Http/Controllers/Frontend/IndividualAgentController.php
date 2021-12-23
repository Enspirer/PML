<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Properties;
use App\Models\Auth\User;
use App\Models\AgentRequest; 

class IndividualAgentController extends Controller
{
     /**
     * @return \Illuminate\View\View
     */
    public function index($id)
    {
        $agent_details = AgentRequest::where('id',$id)->first();
        // dd($agent_details);

        $all_properties = Properties::where('user_id',$agent_details->user_id)->where('sold_request',null)->where('admin_approval','=','Approved')->get();
        // dd($all_properties);

        $sale_properties = Properties::where('user_id',$agent_details->user_id)->where('sold_request',null)->where('transaction_type','=','sale')->where('admin_approval','=','Approved')->get();
        // dd($sale_properties);

        $rent_properties = Properties::where('user_id',$agent_details->user_id)->where('sold_request',null)->where('transaction_type','=','rent')->where('admin_approval','=','Approved')->get();
        // dd($rent_properties);

        return view('frontend.individual-agent',[
            'agent_details' => $agent_details,
            'all_properties' => $all_properties,
            'sale_properties' => $sale_properties,
            'rent_properties' => $rent_properties
        ]);
    }
}
