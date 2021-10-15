<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Settings;

class SettingsController extends Controller
{
    public function index()
    {
        $app_title = Settings::where('key','=','app_title')->first();
        $slider_active = Settings::where('key','=','slider_active')->first();
        $contact_us_admin_email = Settings::where('key','=','contact_us_admin_email')->first();
        $news_section_active = Settings::where('key','=','news_section_active')->first();
        $address = Settings::where('key','=','address')->first();
        $phone_number = Settings::where('key','=','phone_number')->first();
        $fax = Settings::where('key','=','fax')->first();
        $facebook = Settings::where('key','=','facebook')->first();
        $linkdin = Settings::where('key','=','linkdin')->first();
        $youtube = Settings::where('key','=','youtube')->first();
        $twitter = Settings::where('key','=','twitter')->first();
        $email = Settings::where('key','=','email')->first();

        return view('backend.settings.index',[
            'app_title' => $app_title,
            'slider_active' => $slider_active,
            'contact_us_admin_email' => $contact_us_admin_email,
            'news_section_active' => $news_section_active,
            'address' => $address,
            'phone_number' => $phone_number,
            'fax' => $fax,
            'facebook' => $facebook,
            'linkdin' => $linkdin,
            'youtube' => $youtube,
            'twitter' => $twitter,
            'email' => $email,
        ]);
    }

    public function settings_update(Request $request)
    {            
        // dd($request);
        $update = new Settings;

        $update->value=$request->app_title;
        Settings::where('key','=','app_title')->update($update->toArray());

        $update->value=$request->address;
        Settings::where('key','=','address')->update($update->toArray());

        $update->value=$request->email;
        Settings::where('key','=','email')->update($update->toArray());

        $update->value=$request->contact_us_admin_email;
        Settings::where('key','=','contact_us_admin_email')->update($update->toArray());

        $update->value=$request->fax;
        Settings::where('key','=','fax')->update($update->toArray());        

        $phone_number = $request->phone_number;

        $final_array = [];
                    
        foreach($phone_number as $key => $number){

            $item_group = [                            
                'number' => $number
            ];

            array_push($final_array,$item_group);
        } 

        $update->value=json_encode($final_array);

        Settings::where('key','=','phone_number')->update($update->toArray());

        $update->value=$request->twitter;
        Settings::where('key','=','twitter')->update($update->toArray());

        $update->value=$request->linkdin;
        Settings::where('key','=','linkdin')->update($update->toArray());

        $update->value=$request->facebook;
        Settings::where('key','=','facebook')->update($update->toArray());

        $update->value=$request->youtube;
        Settings::where('key','=','youtube')->update($update->toArray());

        $update->value=$request->news_section_active;
        Settings::where('key','=','news_section_active')->update($update->toArray());

        $update->value=$request->slider_active;
        Settings::where('key','=','slider_active')->update($update->toArray());
       
        return back()->withFlashSuccess('Updated Successfully');                

    }



    public function about_us()
    {
        $about_us = Settings::where('key','=','about_us_content')->first();

        return view('backend.settings.about_us',[
            'about_us' => $about_us
        ]);
    }

    public function about_us_update(Request $request)
    {            
        $update = new Settings;

        $update->value=$request->about_us;
        
        Settings::where('key','=','about_us_content')->update($update->toArray());
        return back()->withFlashSuccess('Updated Successfully');                

    }

    public function privacy_policy()
    {
        $privacy_policy = Settings::where('key','=','privacy_policy_content')->first();

        return view('backend.settings.privacy_policy',[
            'privacy_policy' => $privacy_policy
        ]);
    }

    public function privacy_policy_update(Request $request)
    {            
        $update = new Settings;

        $update->value=$request->privacy_policy;
        
        Settings::where('key','=','privacy_policy_content')->update($update->toArray());
        return back()->withFlashSuccess('Updated Successfully');                

    }

    public function terms_and_conditions()
    {
        $terms_and_conditions = Settings::where('key','=','terms_and_conditions_content')->first();

        return view('backend.settings.terms_and_conditions',[
            'terms_and_conditions' => $terms_and_conditions
        ]);
    }

    public function terms_and_conditions_update(Request $request)
    {            
        $update = new Settings;

        $update->value=$request->terms_and_conditions;
        
        Settings::where('key','=','terms_and_conditions_content')->update($update->toArray());
        return back()->withFlashSuccess('Updated Successfully');                

    }

    public function contactus_thanks()
    {
        $contactus_thanks = Settings::where('key','=','contact_us_thank_you_email_note')->first();

        return view('backend.settings.contactus_thanks',[
            'contactus_thanks' => $contactus_thanks
        ]);
    }

    public function contactus_thanks_update(Request $request)
    {            
        $update = new Settings;

        $update->value=$request->contactus_thanks;
        
        Settings::where('key','=','contact_us_thank_you_email_note')->update($update->toArray());
        return back()->withFlashSuccess('Updated Successfully');                

    }










}
