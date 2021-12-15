<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Properties;
use App\Models\PropertyType;
use App\Models\Country;

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

        $properties_promoted = Properties::where('promoted','Enabled')->where('main_category','For Sale')->where('admin_approval','Approved')->take(3)->latest()->get();
        // dd($properties_promoted);

        $properties_premium = Properties::where('premium','Enabled')->where('main_category','For Sale')->where('admin_approval','Approved')->get();
        // dd($properties_premium);

        $properties = Properties::where('premium','!=','Enabled')->where('main_category','For Sale')->where('admin_approval','Approved')->paginate(2);

        $all_properties = Properties::where('main_category','For Sale')->where('admin_approval','Approved')->get();
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


    public function for_sale($key_name,$min_price,$max_price,$transaction_type,$property_type,$beds,$baths,$land_size,$listed_since,$building_type,$open_house,$zoning_type,$units,$building_size,$farm_type,$parking_type,$city)
    {

        // $property_types = PropertyType::where('status','=','1')->get();
        // $countries = Country::where('status',1)->get();

        $properties = Properties::where('admin_approval', 'Approved');
        // ->where('sold_request',null)
        // ->where('country',get_country_cookie(request())->country_name)
        

        if($key_name != 'key_name'){

            $properties->where('name', 'like', '%' .  $key_name . '%')->orWhere('city', 'like', '%' .  $key_name . '%');

        }

        if($max_price != 'max_price' && $min_price != 'min_price'){
            $properties->where('price', '<=', $max_price)->where('price', '>=', $min_price);
        }
        elseif($max_price != 'max_price' && $min_price == 'min_price'){
            $properties->where('price', '<=', $max_price);
        }
        elseif($max_price == 'max_price' && $min_price != 'min_price'){
            $properties->where('price', '>=', $min_price);
        }



        if($transaction_type != 'transaction_type'){
            $properties->where('transaction_type', $transaction_type);
        }

        
        

        if($property_type != 'property_type'){
            $properties->where('property_type', $property_type);
        }

        if($beds != 'beds'){
            if($beds == 'greater-than-5') {
                $properties->where('beds', '>', 5);
            }
            else {
                $properties->where('beds', $beds);
            }
        }
        

        if($baths != 'baths'){
            if($baths == 'greater-than-5') {
                $properties->where('baths', '>', 5);
            }
            else {
                $properties->where('baths', $baths);
            }
        }

        if($land_size != 'land_size'){
            $properties->where('land_size', $land_size);
        }

        if($listed_since != 'listed_since'){
            $properties->where('created_at', '>', $listed_since);
        }

        if($building_type != 'building_type'){
            $properties->where('building_type', $building_type);
        }

        if($open_house != 'open_house'){
            $properties->where('open_house_only', $open_house);
        }

        if($zoning_type != 'zoning_type'){
            $properties->where('zoning_type', $zoning_type);
        }

        if($units != 'units'){
            $properties->where('number_of_units', $units);
        }

        if($building_size != 'building_size'){
            $properties->where('building_size', $building_size);
        }

        if($farm_type != 'farm_type'){
            $properties->where('farm_type', $farm_type);
        }

        if($parking_type != 'parking_type'){
            $properties->where('parking_type', $parking_type);
        }

        if($city != 'city'){
            $properties->where('city', $city);
        }

        // dd($properties->get());

        $fe_properties = $properties->paginate(2);

        // dd($fe_properties);


        $properties_promoted = $properties->where('promoted','Enabled')->take(3)->latest()->get();

        $properties_premium = $properties->where('premium','Enabled')->get();

        // $properties = $properties->where('premium','!=','Enabled')->paginate(2);

        $all_properties = Properties::where('main_category','For Sale')->where('admin_approval','Approved')->get();
        $count_for_sale = count($all_properties);








        // $properties_promoted = Properties::where('promoted','Enabled')->where('main_category','For Sale')->where('admin_approval','Approved')->take(3)->latest()->get();
        // dd($properties_promoted);

        // $properties_premium = Properties::where('premium','Enabled')->where('main_category','For Sale')->where('admin_approval','Approved')->get();
        // dd($properties_premium);

        // $properties = Properties::where('premium','!=','Enabled')->where('main_category','For Sale')->where('admin_approval','Approved')->paginate(2);

        // $all_properties = Properties::where('main_category','For Sale')->where('admin_approval','Approved')->get();
        // $count_for_sale = count($all_properties);
        // dd($count_for_sale);

     
        return view('frontend.for_sale',[
            // 'filteredProperty' => $filteredProperty, 
            'properties_promoted' => $properties_promoted,
            'count_for_sale' => $count_for_sale,
            'properties' => $fe_properties,
            'properties_premium' => $properties_premium
        ]);
    }










}
