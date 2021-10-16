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
    
}