<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use App\Models\Settings;
use App\Models\Country;
use App\Models\Properties;


class HomeFeaturedController extends Controller
{

    public function create()
    {
        $properties = Properties::where('admin_approval', 'Approved')->where('sold_request',null)->get();

        // dd($properties);

        $settings = Settings::where('key','home_page_featured')->first();

        if($settings->value == null){
            $count = null;
        }else{
            $count = count(json_decode($settings->value)[0]->properties);
        }
        // dd($count);

        return view('backend.home_page_features.create',[
            'properties' => $properties,
            'settings' => $settings,
            'count' => $count
        ]);  
    }

    public function store(Request $request)
    {
        // dd($request);

        if($request->properties1 == null){
            return back()->withErrors('Add Atleast One Property');   
        }

        $out_json = $request->properties1;

        $array = [
            'properties' => $out_json

        ];

        $final = [$array];

        $featuredProperties = DB::table('settings') ->where('key','home_page_featured')->update(
            [
                'value' => json_encode($final)
            ]
        );

        return back()->withFlashSuccess('Updated Successfully'); 
    }












    public function home_page_latest_create()
    {
        $properties = Properties::where('admin_approval', 'Approved')->where('sold_request',null)->get();

        // dd($properties);

        $settings = Settings::where('key','home_page_latest')->first();
        // dd($settings);

        if($settings->value == null){
            $count = null;
        }else{
            $count = count(json_decode($settings->value)[0]->properties);
        }
        // dd($count);

        return view('backend.home_page_latest.create',[
            'properties' => $properties,
            'settings' => $settings,
            'count' => $count
        ]);  
    }

    public function home_page_latest_store(Request $request)
    {
        // dd($request);

        if($request->properties1 == null){
            return back()->withErrors('Add Atleast One Property');   
        }        

        $out_json = $request->properties1;

        $array = [
            'properties' => $out_json

        ];

        $final = [$array];

        $featuredProperties = DB::table('settings') ->where('key','home_page_latest')->update(
            [
                'value' => json_encode($final)
            ]
        );

        return back()->withFlashSuccess('Updated Successfully'); 
    }


}
