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
    
}
