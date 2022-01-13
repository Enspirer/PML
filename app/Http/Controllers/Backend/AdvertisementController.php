<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;

class AdvertisementController extends Controller
{    
    public function index()
    {
        return view('backend.sidebar_ad.index');
    }

    public function property_index()
    {
        return view('backend.property_page_ad.index');
    }

    public function agents_index()
    {
        return view('backend.agent_page_ad.index');
    }

    public function solo_property_index()
    {
        return view('backend.individual_property_ad.index');
    }

    public function solo_agent_index()
    {
        return view('backend.individual_agent_ad.index');
    }

    public function homeloan_ad_index()
    {
        return view('backend.homeloan_page_ad.index');
    }

    public function update1(Request $request)
    {        
        $update = new Settings;

        $update->value=$request->link;
        Settings::where('key','=','sidebar_advertiment_link_1')->update($update->toArray()); 
        
        $update->value=$request->description;
        Settings::where('key','=','sidebar_advertiment_description_1')->update($update->toArray());

        $update->value=$request->image;
        Settings::where('key','=','sidebar_advertiment_1')->update($update->toArray());

        return back()->withFlashSuccess('Updated Advertisement 1 Successfully'); 
    }

    public function update2(Request $request)
    {        
        $update = new Settings;

        $update->value=$request->link;
        Settings::where('key','=','sidebar_advertiment_link_2')->update($update->toArray()); 
        
        $update->value=$request->description;
        Settings::where('key','=','sidebar_advertiment_description_2')->update($update->toArray());

        $update->value=$request->image;
        Settings::where('key','=','sidebar_advertiment_2')->update($update->toArray());

        return back()->withFlashSuccess('Updated Advertisement 2 Successfully'); 
    }

    public function property_update1(Request $request)
    {        
        $update = new Settings;

        $update->value=$request->link;
        Settings::where('key','=','property_page_link_1')->update($update->toArray()); 
        
        $update->value=$request->description;
        Settings::where('key','=','property_page_description_1')->update($update->toArray());

        $update->value=$request->image;
        Settings::where('key','=','property_page_advertiment_1')->update($update->toArray());

        return back()->withFlashSuccess('Updated Advertisement 1 Successfully'); 
    }

    public function property_update2(Request $request)
    {        
        $update = new Settings;

        $update->value=$request->link;
        Settings::where('key','=','property_page_link_2')->update($update->toArray()); 
        
        $update->value=$request->description;
        Settings::where('key','=','property_page_description_2')->update($update->toArray());

        $update->value=$request->image;
        Settings::where('key','=','property_page_advertiment_2')->update($update->toArray());

        return back()->withFlashSuccess('Updated Advertisement 2 Successfully'); 
    }

    public function property_update3(Request $request)
    {        
        $update = new Settings;

        $update->value=$request->link;
        Settings::where('key','=','property_page_link_3')->update($update->toArray()); 
        
        $update->value=$request->description;
        Settings::where('key','=','property_page_description_3')->update($update->toArray());

        $update->value=$request->image;
        Settings::where('key','=','property_page_advertiment_3')->update($update->toArray());

        return back()->withFlashSuccess('Updated Advertisement 3 Successfully'); 
    }





    public function agents_update1(Request $request)
    {        
        $update = new Settings;

        $update->value=$request->link;
        Settings::where('key','=','agents_page_link_1')->update($update->toArray()); 
        
        $update->value=$request->description;
        Settings::where('key','=','agents_page_description_1')->update($update->toArray());

        $update->value=$request->image;
        Settings::where('key','=','agents_page_advertiment_1')->update($update->toArray());

        return back()->withFlashSuccess('Updated Advertisement 1 Successfully'); 
    }

    public function agents_update2(Request $request)
    {        
        $update = new Settings;

        $update->value=$request->link;
        Settings::where('key','=','agents_page_link_2')->update($update->toArray()); 
        
        $update->value=$request->description;
        Settings::where('key','=','agents_page_description_2')->update($update->toArray());

        $update->value=$request->image;
        Settings::where('key','=','agents_page_advertiment_2')->update($update->toArray());

        return back()->withFlashSuccess('Updated Advertisement 2 Successfully'); 
    }

    public function agents_update3(Request $request)
    {        
        $update = new Settings;

        $update->value=$request->link;
        Settings::where('key','=','agents_page_link_3')->update($update->toArray()); 
        
        $update->value=$request->description;
        Settings::where('key','=','agents_page_description_3')->update($update->toArray());

        $update->value=$request->image;
        Settings::where('key','=','agents_page_advertiment_3')->update($update->toArray());

        return back()->withFlashSuccess('Updated Advertisement 3 Successfully'); 
    }

    public function solo_property_update1(Request $request)
    {        
        $update = new Settings;

        $update->value=$request->link;
        Settings::where('key','=','solo_property_advertiment_link_1')->update($update->toArray()); 
        
        $update->value=$request->description;
        Settings::where('key','=','solo_property_advertiment_description_1')->update($update->toArray());

        $update->value=$request->image;
        Settings::where('key','=','solo_property_advertiment_1')->update($update->toArray());

        return back()->withFlashSuccess('Updated Advertisement 1 Successfully'); 
    }

    public function solo_property_update2(Request $request)
    {        
        $update = new Settings;

        $update->value=$request->link;
        Settings::where('key','=','solo_property_advertiment_link_2')->update($update->toArray()); 
        
        $update->value=$request->description;
        Settings::where('key','=','solo_property_advertiment_description_2')->update($update->toArray());

        $update->value=$request->image;
        Settings::where('key','=','solo_property_advertiment_2')->update($update->toArray());

        return back()->withFlashSuccess('Updated Advertisement 2 Successfully'); 
    }

    public function solo_agent_update1(Request $request)
    {        
        $update = new Settings;

        $update->value=$request->link;
        Settings::where('key','=','solo_agent_advertiment_link_1')->update($update->toArray()); 
        
        $update->value=$request->description;
        Settings::where('key','=','solo_agent_advertiment_description_1')->update($update->toArray());

        $update->value=$request->image;
        Settings::where('key','=','solo_agent_advertiment_1')->update($update->toArray());

        return back()->withFlashSuccess('Updated Advertisement 1 Successfully'); 
    }

    public function solo_agent_update2(Request $request)
    {        
        $update = new Settings;

        $update->value=$request->link;
        Settings::where('key','=','solo_agent_advertiment_link_2')->update($update->toArray()); 
        
        $update->value=$request->description;
        Settings::where('key','=','solo_agent_advertiment_description_2')->update($update->toArray());

        $update->value=$request->image;
        Settings::where('key','=','solo_agent_advertiment_2')->update($update->toArray());

        return back()->withFlashSuccess('Updated Advertisement 2 Successfully'); 
    }








    public function homeloan_ad_update1(Request $request)
    {        
        $update = new Settings;

        $update->value=$request->link;
        Settings::where('key','=','home_loan_advertisment_link')->update($update->toArray()); 
        
        $update->value=$request->description;
        Settings::where('key','=','home_loan_advertisment_description')->update($update->toArray());

        $update->value=$request->image;
        Settings::where('key','=','home_loan_advertisment')->update($update->toArray());

        return back()->withFlashSuccess('Updated Advertisement 1 Successfully'); 
    }

    public function homeloan_ad_update2(Request $request)
    {        
        $update = new Settings;

        $update->value=$request->link;
        Settings::where('key','=','home_loan_advertisment_link_2')->update($update->toArray()); 
        
        $update->value=$request->description;
        Settings::where('key','=','home_loan_advertisment_description_2')->update($update->toArray());

        $update->value=$request->image;
        Settings::where('key','=','home_loan_advertisment_2')->update($update->toArray());

        return back()->withFlashSuccess('Updated Advertisement 2 Successfully'); 
    }
    
}
