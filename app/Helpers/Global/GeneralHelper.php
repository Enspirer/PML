<?php

use App\Models\Settings; 
use App\Models\Favorite; 
use App\Models\AgentRequest; 
use App\Models\Location; 
use App\Models\Country; 
use Illuminate\Http\Request;

if (! function_exists('app_name')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function app_name()
    {
        return config('app.name');
    }
}

if (! function_exists('gravatar')) {
    /**
     * Access the gravatar helper.
     */
    function gravatar()
    {
        return app('gravatar');
    }
}

if (! function_exists('home_route')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function home_route()
    {
        if (auth()->check()) {
            if (auth()->user()->can('view backend')) {
                return 'admin.dashboard';
            }

            return 'frontend.user.dashboard';
        }

        return 'frontend.index';
    }
}

if (!function_exists('isHttps')) {

    function isHttps()
    {
        return !empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS']);
    }
}
        
if (!function_exists('getBaseURL')) {
    function getBaseURL()
    {
        $root = (isHttps() ? "https://" : "http://").$_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
        
        return $root;
    }
}
        
        
if (!function_exists('getFileBaseURL')) {
    function getFileBaseURL()
    {
        if(env('FILESYSTEM_DRIVER') == 's3'){
            return env('AWS_URL').'/';
        }
        else {
            return getBaseURL().'';
        }
    }
}

//return file uploaded via uploader
if (!function_exists('uploaded_asset')) {
    function uploaded_asset($id)
    {
        if (($asset = \App\Models\Upload::find($id)) != null) {
            return my_asset($asset->file_name);
        }
        return url('/').'/img/no-image.jpg';
    }
}

if (! function_exists('my_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param  string  $path
     * @param  bool|null  $secure
     * @return string
     */
    function my_asset($path, $secure = null)
    {
         return app('url')->asset(''.$path, $secure);        
    }
}

if (! function_exists('get_settings')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function get_settings($key)
    {       
        $settings = Settings::where('key',$key)->first();
        if($settings == null){
            return null;
        }else{
            return $settings->value;
        }

    }
}

if (! function_exists('is_favorite')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function is_favorite($property_id, $user_id)
    {

        $favorite = Favorite::where('user_id', $user_id )
            ->where('property_id',$property_id)
            ->first();
        if($favorite)
        {
            return $favorite;
        }else{
            return null;
        }
    }
}

if (! function_exists('is_agent')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function is_agent($user_id)
    {
        $agent = AgentRequest::where('status','Approved')
            ->where('user_id',$user_id)
            ->first();
        if($agent)
        {
            return $agent;
        }else{
            return null;
        }
    }
}

if (! function_exists('is_country_manager')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function is_country_manager($user_id)
    {
        $area_manager = Location::where('area_manager',$user_id)->first();

        if($area_manager)
        {
            return $area_manager;
        }else{
            return null;
        }
    }
}


if (! function_exists('get_country_cookie')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function get_country_cookie($request)
    {
        
        $value = $request->cookie('country_code');

        $country_details = Country::where('country_id',$value)->first();

        // dd($country_details);

        if($country_details)
        {
            return $country_details;
        }else{
            return null;
        }
    }
}

if (! function_exists('get_currency')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function get_currency($request,$price)
    {
        $value = $request->cookie('country_code');

        $country_details = Country::where('country_id',$value)->first();


        if($country_details)
        {
            return $country_details->currency.' '.number_format($country_details->currency_rate * $price,2);
        }else{
            return 'USD '. number_format($price,2);
        }
    }
}


if (! function_exists('current_price')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function current_price($country_id,$price)
    {
        $country_details = Country::where('country_id',$country_id)->first();
        if($country_details)
        {
            return $country_details->currency.' '.number_format($country_details->currency_rate * $price,2);
        }else{
            return 'USD '. number_format($price,2);
        }
    }
}




