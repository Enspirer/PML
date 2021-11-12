<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Properties;

/**
 * Class ForSaleController.
 */
class ForSaleController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $properties_promoted = Properties::where('promoted','Enabled')->where('main_category','For Rent')->where('admin_approval','Approved')->take(3)->latest()->get();
        // dd($properties_promoted);

        $properties_premium = Properties::where('premium','Enabled')->where('main_category','For Rent')->where('admin_approval','Approved')->get();
        // dd($properties_premium);

        $properties = Properties::where('premium','!=','Enabled')->where('main_category','For Rent')->where('admin_approval','Approved')->paginate(2);

        $all_properties = Properties::where('main_category','For Rent')->where('admin_approval','Approved')->get();
        $count_for_sale = count($all_properties);
        // dd($count_for_sale);

        return view('frontend.for_sale',[
            'properties_promoted' => $properties_promoted,
            'count_for_sale' => $count_for_sale,
            'properties' => $properties,
            'properties_premium' => $properties_premium
        ]);
    }

    public function singleProperty()
    {
        return view('frontend.for_sale_single');
    }
}
