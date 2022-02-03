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
use App\Models\Settings;
use App\Models\Upload;
use App\Models\Favorite;
use App\Models\NearLocation;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use DB;
use GuzzleHttp\Client;
use Cart;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */

    public static function get_country($ip) {
        try{
            $client = new Client();
            $res = $client->request('GET', 'http://ipinfo.io/'.$ip.'/country');

            $strDetails = str_replace("\n","",$res->getBody()->getContents());

            return $strDetails;

        }catch (\Exception $exception){
            return null;
        }
    }

    public function image_assets($id)
    {
        // dd($id);

        $uploaded_images = Upload::where('id',$id)->first();

        // return $uploaded_images;

        if ($uploaded_images){
            return response( file_get_contents($uploaded_images->file_name) )
                ->header('Content-Type','image/png');
        }else{
            return response( file_get_contents('/img/no-image.jpg') )
                ->header('Content-Type','image/png');
        }
    }
    

    public function index(Request $request)
    {
       $endetails = get_country_cookie($request);

       if($endetails == null){
           $getClientIP = request()->getClientIp();
           $getcountry = self::get_country($getClientIP);
               if($getcountry){
                   $countryIso = Country::where('country_id',$getcountry)->first();
                   Cookie::queue("country_code", $getcountry ,1000);
               }else{
                   $countryIso = null;
               }
           $countryIso = null;
       }else{
           $countryIso = $endetails;
       }




//        $self = self::setCookie($request->countries_list);

        $property_talk = Posts::where('id',get_settings('property_talk_featured'))->where('status','=','Enabled')->first();
        $posts = Posts::where('status','=','Enabled')->take(6)->latest()->get();
        $property_types = PropertyType::where('status','=','1')->get();

       
        if(get_country_cookie(request()) == null ){
            $featured_properties = Properties::where('admin_approval','Approved')->where('featured','Enabled')->get();
        }else{
            $featured_properties = Properties::where('admin_approval','Approved')->where('featured','Enabled')->where('country',get_country_cookie(request())->id)->get();
        }

        if(get_country_cookie(request()) == null ){
            $latest_properties = Properties::where('admin_approval','Approved')->latest()->take(9)->get();
        }else{
            $latest_properties = Properties::where('admin_approval','Approved')->latest()->take(9)->where('country',get_country_cookie(request())->id)->get();
        }

        $settings = Settings::where('key','home_page_featured')->first();
        $settings_latest = Settings::where('key','home_page_latest')->first();


        // dd($featured_properties);

        return view('frontend.index',[
            'posts' => $posts,
            'property_talk' => $property_talk,
            'featured_properties' => $featured_properties,
            'latest_properties' => $latest_properties,
            'property_types' => $property_types,
            'default_country' => $countryIso,
            'settings' => $settings,
            'settings_latest' => $settings_latest
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


    public static function setIPCookie($param)
    {
        // dd($param);
        $response = new Response('Set Cookie');
        $response->withCookie(cookie('country_ip', $param,60));
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

        if($lng == null) {
            $lng = 'long';
        }

        if($lat == null) {
            $lat = 'lat';
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
            $city,
            $lng,
            $lat,
            $areacod
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

        if($city == null){
            $keywords = 'key_name';
        }else{
            $keywords = $city;
        }

        $add->keyword=$keywords;

        if(!empty( auth()->user()->id) === true ){
            $add->user_id=auth()->user()->id;
        } 
        

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
        $long = 'long';
        $lat = 'lat';
        $area_coordinator = 'area_coordinator';
        
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
            $city,
            $long,
            $lat,
            $area_coordinator
        ]);                           

    }

    public static  function haversineGreatCircleDistance(
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


    public function nest_property($lng,$lat,Request $request)
    {
        $properties =  Properties::all();
        $finalOut = null;

        foreach ($properties as $property)
        {
           $distance =   self::haversineGreatCircleDistance($lat,$lng,$property->lat,$property->long);
            $distandPanel =  round($distance/1000,2);
//           if($distandPanel < 10 ){

//               $stakGroup = [
//                   'propery_id' => $property->id,
//                   'distance' => $distandPanel. ' KM',
//                   'property' => $property->name
//               ];

            $rebust = '<div class="card">'.
                        '<a href="for-sale/single-property/'.$property->id.'">'.
                            '<div class="card-body">'.
                                '<div class="info-card" style="display:flex;">'.
                                    '<div class="info-img-area" style="flex:1;">'.
                                        '<img style="height:60px;width: 85px;" src="'.uploaded_asset($property->feature_image_id).'" alt="">'.
                                    '</div>'.
                                    '<div class="info-desc-area" style="flex:2;">'.
                                        '<p style="font-weight:bold;">'.$property->name.'</p>'.
                                        '<p style="font-size: 9px;overflow: hidden;text-overflow: ellipsis;display: -webkit-box;height: 40px;">'.$property->description.'</p>'.
                                        '<div class="icon-area" style="display: block;">'.
                                            ' <span class="icon" style="display: inline-flex;"> LKR '.number_format($property->price,2).'</span>'.
                                        '</div>'.
                                    '</div>'.
                                '</div>'.
                            '</div>'.
                            '</a>'.
                        '</div>';









//            $rebust = '<div class="card"><div class="card-body"></div> <div class="row"><div class="col-md-4"></div><div class="col-md-8"><h4>'.$property->name.'</h4></div> </div> </div>';


               $finalOut .= $rebust;
//           }


        }



        return $finalOut;
    }


    public function near_location($property_id,$type) {
        
        $near_location = NearLocation::where('property_id',$property_id)->where('type',$type)->get();

        $outarray =[];

        foreach ($near_location as $nearloc)
        {
            $outsubArray = [
              'id' => $nearloc->id ,
              'lng' => (double) $nearloc->lng ,
              'lat' => (double) $nearloc->lat ,
              'name' => $nearloc->name ,
              'address' => $nearloc->address ,
              'property_id' => $nearloc->property_id ,
              'icon' => $nearloc->icon ,
              'feature_img' => $nearloc->feature_img ,
              'type' => $nearloc->type ,
              'distance' => $nearloc->distance ,
            ];
            array_push($outarray,$outsubArray);
        }
        if($near_location){
            return $outarray;
        }else{
            return null;
        }
    }


    public function favourite_cookie(Request $request)
    {        
        // dd($request);

        $prop_cookie_favourite = Properties::where('id',$request->cookie_property_id)->first();

        Cart::add($prop_cookie_favourite->id, $prop_cookie_favourite->name, $prop_cookie_favourite->price, 1, [
            'feature_image_id' => $prop_cookie_favourite->feature_image_id,
            'transaction_type' => $prop_cookie_favourite->transaction_type
        ]);

        return back();
    }

    public function favourite_cookie_properties(Request $request)
    {        
        // dd($request);
        $favorite_item = Cart::getContent();
        // dd($favorite_item);

        return view('frontend.favourite_property_cookie',[
            'favorite_item' => $favorite_item
        ]);
    }

    public function favourite_cookie_properties_remove($id)
    {           
        Cart::remove($id);

        return back();
    }


}


