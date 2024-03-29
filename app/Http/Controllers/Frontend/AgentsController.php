<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Properties;
use App\Models\PropertyType;
use App\Models\Country;
use App\Models\Location;
use App\Models\Auth\User;
use App\Models\AgentRequest;

/**
 * Class AgentsController.
 */
class AgentsController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    


    public function index($country,$area,$agent_type,$agent_name, Request $request)
    {
        // dd($agent_name);

        $agents = AgentRequest::where('status','Approved');



        $countries = Country::where('status',1)->get();

        if($country != 'country'){
            $agents->where('country',$country);
        }

        if($area != 'area'){
            $agents->where('area',$area);
        }

        // dd($agents->get());


        if($agent_type != 'agent_type')
        {
           $agents->where('agent_type',$agent_type);
        }

       

        if($agent_name != 'agent_name'){
            $agents->where('name','like','%'.$agent_name.'%');
        }

        $count_for_sale = count($agents->get());

        $age = $agents->get();

        // dd($age);                

        $property_types = PropertyType::where('status','=','1')->get();
        

        return view('frontend.agents', [
            'agents' => $age,
            'countries' => $countries,
            'count_for_sale' => $count_for_sale,
            'selected_country' => $country,
            'property_types' => $property_types
        ]);
    }

    public function store(Request $request)
    {  
        // dd($request);
        

        $country = $request->country;
        $area = $request->area;
        $agent_type = $request->agent_type;
        // $agent_name = $request->agent_name;

        if($request->agent_name == null){
            $agent_name = 'agent_name';
        }else{
            $agent_name = $request->agent_name;
        }

        // dd($agent_name);


        return redirect()->route('frontend.find-agent',[
            'country' => $country,
            'area' => $area,
            'agent_type' => $agent_type,
            'agent_name' => $agent_name
        ]);

    }



}
