<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp;
class NearLocation extends Model
{
    public static function haversineGreatCircleDistance(
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


    public static function nearlocation($lat,$lng,$property_id,$type,$radus = 1500)
    {

            $client = new GuzzleHttp\Client();
            $url = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$lat.'%2C'.$lng.'&radius='.$radus.'&type='.$type.'&key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac';
            $res = $client->request('GET', $url);
            $refidymeter = json_decode($res->getBody()->getContents());
            if($refidymeter->status == 'ZERO_RESULTS'){
                $lat = null;
                $lng = null;
                $areacod = 'area_coordinator';
                return 'zero_result';
            }else{

                $propetyDetails = Properties::where('id',$property_id)->first();


                foreach ($refidymeter->results as $place)
                {
                    $distance = self::haversineGreatCircleDistance($propetyDetails->lat,$propetyDetails->long,$place->geometry->location->lng,$place->geometry->location->lat);
                    $details = new NearLocation;
                    $details->lng = $place->geometry->location->lng;
                    $details->lat = $place->geometry->location->lat;
                    $details->name = $place->name;
                    $details->address = $place->vicinity;
                    $details->property_id = $property_id;
                    $details->icon  = $place->icon;
                    $details->distance  = $distance;
                    $details->type = $type;
                    $details->save();

                }

                return 'success';



                // $north_string1 =  $boundtry->northeast->lat.'_'.$boundtry->northeast->lng;
                // $south_string2 =  $boundtry->southwest->lat.'_'.$boundtry->southwest->lng;


            }
    }


}
