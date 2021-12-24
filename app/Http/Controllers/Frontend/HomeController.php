<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;
use App\Models\Properties;
use App\Models\PropertyType;
use App\Models\Country;
use App\Models\Location;
use App\Models\Auth\User;
use App\Models\AgentRequest;
use App\Models\Favorite;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $latest_post = Posts::where('status','=','Enabled')->take(1)->latest()->first();
        $posts = Posts::where('status','=','Enabled')->take(6)->latest()->get();

        $property_types = PropertyType::where('status','=','1')->get();

        $featured_properties = Properties::where('admin_approval','Approved')->where('featured','Enabled')->get();
        $latest_properties = Properties::where('admin_approval','Approved')->latest()->take(8)->get();
        // dd($featured_properties);

        return view('frontend.index',[
            'posts' => $posts,
            'latest_post' => $latest_post,
            'featured_properties' => $featured_properties,
            'latest_properties' => $latest_properties,
            'property_types' => $property_types
        ]);
    }

    public function home_page(Request $request)
    {
        $self = self::setCookie($request->countries_list);

        // dd($self);
        // dd($request);

        return redirect()->route('frontend.index');
    }

    public function countryChange(Request $request) {

        $country_code = $request->countries_list;
        // dd($country_code);

        Cookie::queue("country_code", $country_code ,1000);
        return back();
   
    }

    public static function setCookie($param)
    {
        // dd($param);
        $response = new Response('Set Cookie');
        $response->withCookie(cookie('country', $param,60));
        return $response;
    }

    public function get_search_result(Request $request)
    {
        // dd($request);

        if(request('search_keyword') != null) {
            $key_name = request('search_keyword');
        }
        else {
            $key_name = 'key_name';
        }


        // if(request('category_type') != null) {
        //     $category_type = request('category_type');
        // }
        // else {
        //     $category_type = 'category_type';
        // }

        if(request('min_price') != 0) {
            $min_price = request('min_price');
        }
        else {
            $min_price = 'min_price';
        }

        if(request('max_price') != 0) {
            $max_price = request('max_price');
        }
        else {
            $max_price = 'max_price';
        }

        // dd($max_price);

        if(request('city') != null) {
            $city = request('city');
        }
        else {
            $city = 'city';
        }
    


        if(request('transaction_type') != null) {
            $transaction_type = request('transaction_type');
        }
        else {
            $transaction_type = 'transaction_type';
        }

        if(request('propertyType') != null) {
            $property_type = request('propertyType');
        }
        else {
            $property_type = 'property_type';
        }


        if(request('beds') != null) {
            $beds = request('beds');
        }
        else {
            $beds = 'beds';
        }


        if(request('baths') != null) {
            $baths = request('baths');
        }
        else {
            $baths = 'baths';
        }

        if(request('land_size') != null) {
            $land_size = request('land_size');
        }
        else {
            $land_size = 'land_size';
        }

        if(request('listed_since') != null) {
            $listed_since = request('listed_since');
        }
        else {
            $listed_since = 'listed_since';
        }

        if(request('building_type') != null) {
            $building_type = request('building_type');
        }
        else {
            $building_type = 'building_type';
        }

        if(request('open_house') != null) {
            $open_house = request('open_house');
        }
        else {
            $open_house = 'open_house';
        }

        if(request('zoning_type') != null) {
            $zoning_type = request('zoning_type');
        }
        else {
            $zoning_type = 'zoning_type';
        }

        if(request('number_of_units') != null) {
            $units = request('number_of_units');
        }
        else {
            $units = 'units';
        }


        if(request('building_size') != null) {
            $building_size = request('building_size');
        }
        else {
            $building_size = 'building_size';
        }


        if(request('farm_type') != null) {
            $farm_type = request('farm_type');
        }
        else {
            $farm_type = 'farm_type';
        }


        if(request('parking_type') != null) {
            $parking_type = request('parking_type');
        }
        else {
            $parking_type = 'parking_type';
        }



        // dd($key_name,
        //     $max_price,
        //     $min_price,
        //     $category_type,
        //     $transaction_type,
        //     $property_type,
        //     $beds,
        //     $baths,
        //     $land_size,
        //     $listed_since,
        //     $building_type,
        //     $open_house,
        //     $zoning_type,
        //     $units,
        //     $building_size,
        //     $farm_type,
        //     $parking_type,
        // $city);


        return redirect()->route('frontend.for_sale', [
            $key_name,
            $min_price,
            $max_price,
            $transaction_type,
            $property_type,
            $beds,
            $baths,
            $land_size,
            $listed_since,
            $building_type,
            $open_house,
            $zoning_type,
            $units,
            $building_size,
            $farm_type,
            $parking_type,
            $city
        ]);
    }







}
