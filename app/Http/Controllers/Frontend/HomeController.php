<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use EmilKlindt\MarkerClusterer\Facades\DefaultClusterer;
use Illuminate\Http\Request;
use App\Models\Properties;
use App\Models\PropertyType;
use App\Models\Country;
use App\Models\Location;
use App\Models\Auth\User;
use App\Models\AgentRequest;
use App\Models\Category;
use App\Models\Search;
use App\Models\Favorite;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use DB;

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

        // return redirect()->route('frontend.for_sale');
   
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

    public function map_api(){
         $property = Properties::all();

         $enOutArray = [];

         foreach ($property as $prty)
         {
             $outfin = [
                'lat' => (float)$prty->lat,
                'lng' => (float)$prty->long,
                'id' => $prty->id,
                'name' => $prty->name,
                'description' => $prty->description,
                'price' => $prty->price,
                'feature_image' => uploaded_asset($prty->feature_image_id)
             ];
             array_push($enOutArray,$outfin);
         }

         return response()->json($enOutArray);

    }


    public function facebook_news()
    {
        $xml=simplexml_load_file("http://fetchrss.com/rss/6163bb4465c6a34d4a4a1b536163bc498abc1b7e6a0d97d2.xml") or die("Error: Cannot create object");
        $fb_news = [];
        foreach ($xml->channel->item as $key => $itemr)
        {
            array_push($fb_news,$itemr);
        }
        $last_fb_news = $fb_news[0];
        $doc = new \DOMDocument();
        $doc->loadHTML($last_fb_news->description);
        $xpath = new \DOMXPath($doc);
        $src = $xpath->evaluate("string(//img/@src)");
        $last_fb_news->image = $src;

        return json_encode($last_fb_news);

    }

    public function twitter_news()
    {
        $xml=simplexml_load_file("http://fetchrss.com/rss/6163bb4465c6a34d4a4a1b5361641714308e6f15f55a46a2.xml") or die("Error: Cannot create object");
        $fb_news = [];
        foreach ($xml->channel->item as $key => $itemr)
        {
            array_push($fb_news,$itemr);
        }
        // dd($fb_news);
        $last_fb_news = $fb_news[0];
        $doc = new \DOMDocument();
        $doc->loadHTML($last_fb_news->description);
        $xpath = new \DOMXPath($doc);
        $src = $xpath->evaluate("string(//img/@src)");
        $last_fb_news->image = $src;

        return json_encode($last_fb_news);
    }



    public function individual_post(Request $request,$id)
    {
        $post_details = Posts::where('id',$id)->where('status','=','Enabled')->first();        
        // dd($post_details);

        return view('frontend.individual_post',[
            'post_details' => $post_details
        ]);
    }

    public function fake_makers(Request $request)
    {
        $data = DB::table('properties')
            ->where('lat', '>', str_replace("_",".",$request->swlat) )
            ->where('lat', '<',  str_replace("_",".", $request->nelat) )
            ->where('long', '>',  str_replace("_",".",$request->swlon) )
            ->where('long', '<',  str_replace("_",".",$request->nelon) )
            ->get();

        $outArray = [];

        $countMaker = [
            [
            "I" =>"8482",
            "T" => 2,
            "X" => "79.910000",
            "Y" => "6.905000",
            "C" => 1
            ],[
                "I" =>"8482",
                "T" => 2,
                "X" => "79.881972",
                "Y" => "6.967464",
                "C" => 1
            ]
        ];

        if(count($data) == 0){



            $data = DB::table('properties')->get();



            foreach ($data  as $cold_data)
            {
                $strID = (string) $cold_data->id;

                if($request->zoom > 10){
                    $impack_array = [
                        'I' => $strID,
                        'T' => 2,
                        'X' => round( $cold_data->long) ,
                        'Y' => round($cold_data->lat),
                        'C' => 1
                    ];
                }else{
                    $impack_array = [
                        'I' => $strID,
                        'T' => 2,
                        'X' => round( $cold_data->long) ,
                        'Y' => round($cold_data->lat),
                        'C' => 3
                    ];
                }


                array_push($outArray,$impack_array);
            }

        }else{
            foreach ($data  as $cold_data)
            {
                $strID = (string) $cold_data->id;

                $impack_array = [
                    'I' => $strID,
                    'T' => 3,
                    'X' => substr($cold_data->long, 0, 10) ,
                    'Y' => substr($cold_data->lat, 0, 10),
                    'C' => 1
                ];
                array_push($outArray,$impack_array);
            }
        }



        $mainAarray = [
            'EMsg' => "",
            'Msec' => 185,
            'Ok' => 1,
            'Rid' => $request->sid,
            'Count'=> count($data),
            'Mia' => 0,
            'Polylines' => [

            ],
            'Markers' => $outArray
        ];


        return response()->json($mainAarray);
    }


    public static function cluser_get(){

    }

    function haversineGreatCircleDistance(
        $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo,    $earthRadius = 6371000)
    {
        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
                cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * $earthRadius;
    }




    //search suggestions ajax
    function fetch(Request $request) 

    {


        if($request->get('query')) {
            $query = $request->get('query');
            $data = DB::table('properties')
                    ->where('city', 'like', '%' .  $query . '%')
                    ->get();
                    // dd($data);
            $output = '<ul class="dropdown-menu" style="display:block;position:relative;">';
            foreach($data as $row) 
            {
                $output .= '<li><a style="width: 100%; display: block;" href="'.route('frontend.save_keyword',$row->city).'">'.$row->city.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
       
    }

    

    public function save_keyword(Request $request,$city)
    {    
        // dd($city);      
        
        $add = new Search;

        $add->keyword=$city;
        $add->user_id=auth()->user()->id;

        $add->save();


        $key_name = 'key_name';
        $min_price = 'min_price';
        $max_price = 'max_price';

        if($city == null){
            $city = 'city';
        }else{
            $city = $city;
        }

        $transaction_type = 'transaction_type';
        $property_type = 'property_type';
        $beds = 'beds';
        $baths = 'baths';
        $land_size = 'land_size';
        $listed_since = 'listed_since';
        $building_type = 'building_type';
        $open_house = 'open_house';
        $zoning_type = 'zoning_type';
        $units = 'units';
        $building_size = 'building_size';
        $farm_type = 'farm_type';
        $parking_type = 'parking_type';
        
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

