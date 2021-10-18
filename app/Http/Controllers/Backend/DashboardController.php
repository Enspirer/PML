<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AgentRequest;
use App\Models\Properties;
use App\Models\ContactUs;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $all_agent_request = AgentRequest::where('status','!=','Pending')->get()->count();
        $agent_pending = AgentRequest::get()->where('status','=','Pending')->count();
        $contact_us = ContactUs::where('status','=','Pending')->get()->count();
        $property_pending = Properties::get()->where('admin_approval','=','Pending')->count();

        return view('backend.dashboard',[
            'all_agent_request' => $all_agent_request,
            'agent_pending' => $agent_pending,
            'property_pending' => $property_pending,
            'contact_us' => $contact_us
        ]);
    }
}
