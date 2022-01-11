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
    
    public function index()
    {
        return view('backend.home_page_features.index');  
    }

    public function create()
    {
        $properties = Properties::where('admin_approval', 'Approved')->where('sold_request',null)->get();

        // dd($properties);

        $settings = Settings::where('key','home_page_featured')->first();

        $count = count(json_decode($settings->value)[0]->properties);
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


}
