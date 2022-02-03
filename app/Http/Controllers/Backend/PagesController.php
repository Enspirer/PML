<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Settings;

class PagesController extends Controller
{
    
    public function tips_for_buyers()
    {
        $tips_for_buyers = Settings::where('key','=','tips_for_buyers_content')->first();

        return view('backend.pages.tips_for_buyers',[
            'tips_for_buyers' => $tips_for_buyers
        ]);
    }

    public function tips_for_buyers_update(Request $request)
    {            
        $update = new Settings;

        $update->value=$request->tips_for_buyers;
        
        Settings::where('key','=','tips_for_buyers_content')->update($update->toArray());
        return back()->withFlashSuccess('Updated Successfully');                

    }

    public function tips_for_sellers()
    {
        $tips_for_sellers = Settings::where('key','=','tips_for_sellers_content')->first();

        return view('backend.pages.tips_for_sellers',[
            'tips_for_sellers' => $tips_for_sellers
        ]);
    }

    public function tips_for_sellers_update(Request $request)
    {            
        $update = new Settings;

        $update->value=$request->tips_for_sellers;
        
        Settings::where('key','=','tips_for_sellers_content')->update($update->toArray());
        return back()->withFlashSuccess('Updated Successfully');                

    }

    public function commercial_resources()
    {
        $commercial_resources = Settings::where('key','=','commercial_resources_content')->first();

        return view('backend.pages.commercial_resources',[
            'commercial_resources' => $commercial_resources
        ]);
    }

    public function commercial_resources_update(Request $request)
    {            
        $update = new Settings;

        $update->value=$request->commercial_resources;
        
        Settings::where('key','=','commercial_resources_content')->update($update->toArray());
        return back()->withFlashSuccess('Updated Successfully');                

    }

    public function marketing_services()
    {
        $marketing_services = Settings::where('key','=','marketing_services_content')->first();

        return view('backend.pages.marketing_services',[
            'marketing_services' => $marketing_services
        ]);
    }

    public function marketing_services_update(Request $request)
    {            
        $update = new Settings;

        $update->value=$request->marketing_services;
        
        Settings::where('key','=','marketing_services_content')->update($update->toArray());
        return back()->withFlashSuccess('Updated Successfully');                

    }



}
