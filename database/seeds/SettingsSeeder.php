<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('settings')
        ->insert(
            [             
            'key' => 'app_title',
            'value' => 'Enspirer BPlate', 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'version',
            'value' => '0.0.1', 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'copyright_note',
            'value' => 'Powered by Enspirer', 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'slider_active',
            'value' => 0, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'about_us_content',
            'value' => '<p>Tellus mi non felis dui euismod. Rutrum aptent. Facilisi montes integer ridiculus laoreet potenti penatibus fringilla inceptos at aptent sociosqu. Tempus ad dui quis convallis. Potenti lobortis curae; vehicula. Placerat Massa lorem adipiscing. Ultricies. Inceptos at mollis. Aliquam orci. Est malesuada inceptos placerat magna, sapien amet dui. Tellus neque.</p><p>Cras felis pretium curae; nec morbi at pellentesque quisque nonummy accumsan feugiat nostra mattis venenatis pretium ultrices justo hendrerit sociis ornare donec pulvinar Metus. Tellus vitae velit nonummy quisque venenatis suscipit vivamus cubilia elementum sociosqu a consequat risus sodales. Ridiculus conubia proin sociis inceptos cras vestibulum dictum lorem tincidunt ultrices netus. Sapien dolor ad rutrum sem pulvinar nulla porta. Ultricies pulvinar mattis enim morbi augue conubia blandit lorem imperdiet blandit risus odio lacinia nullam nec bibendum id primis vehicula cursus dictum sem ligula quis convallis etiam vitae faucibus condimentum. Tortor nullam.</p><p>Bibendum pulvinar sociosqu lobortis egestas elit montes id tortor conubia lectus. Mollis nunc maecenas mus eget. Augue aenean. Maecenas nascetur aenean venenatis enim Facilisi fames Laoreet aliquet penatibus facilisis varius mus magna amet. Posuere pulvinar neque. Ultrices donec mi dis nunc curae; inceptos phasellus congue et, sapien mollis luctus magnis magna nisl consequat dictum interdum. Egestas euismod tortor ultricies id hendrerit ipsum porttitor augue vulputate aliquam integer dis cras pellentesque. Pharetra ultrices orci montes ipsum arcu. Litora dignissim potenti senectus per fusce et posuere cubilia dolor eu hac imperdiet.</p><p>Per, donec nunc duis pretium suspendisse tristique ultrices lorem magnis pretium ultrices sed nisl odio ipsum. Venenatis phasellus, dapibus a erat inceptos parturient quam feugiat iaculis. Cubilia sagittis. Taciti habitasse fames donec nostra magnis bibendum a tortor class non. Sed feugiat. Laoreet placerat malesuada quam sociis sed feugiat vel id. Massa dui, magnis maecenas varius placerat. Ultricies cursus. Semper suspendisse parturient. Vivamus tellus praesent. A cubilia.</p><p>Amet vel nunc risus ad ad egestas sagittis a risus curae; sapien, nulla eleifend ridiculus neque nibh duis curabitur proin viverra duis gravida scelerisque sit dictum a pede et nisi aptent. Arcu libero, praesent in quam cras lorem ut, ac porttitor euismod quis.</p>', 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'privacy_policy_content',
            'value' => '<p>Tellus mi non felis dui euismod. Rutrum aptent. Facilisi montes integer ridiculus laoreet potenti penatibus fringilla inceptos at aptent sociosqu. Tempus ad dui quis convallis. Potenti lobortis curae; vehicula. Placerat Massa lorem adipiscing. Ultricies. Inceptos at mollis. Aliquam orci. Est malesuada inceptos placerat magna, sapien amet dui. Tellus neque.</p><p>Cras felis pretium curae; nec morbi at pellentesque quisque nonummy accumsan feugiat nostra mattis venenatis pretium ultrices justo hendrerit sociis ornare donec pulvinar Metus. Tellus vitae velit nonummy quisque venenatis suscipit vivamus cubilia elementum sociosqu a consequat risus sodales. Ridiculus conubia proin sociis inceptos cras vestibulum dictum lorem tincidunt ultrices netus. Sapien dolor ad rutrum sem pulvinar nulla porta. Ultricies pulvinar mattis enim morbi augue conubia blandit lorem imperdiet blandit risus odio lacinia nullam nec bibendum id primis vehicula cursus dictum sem ligula quis convallis etiam vitae faucibus condimentum. Tortor nullam.</p><p>Bibendum pulvinar sociosqu lobortis egestas elit montes id tortor conubia lectus. Mollis nunc maecenas mus eget. Augue aenean. Maecenas nascetur aenean venenatis enim Facilisi fames Laoreet aliquet penatibus facilisis varius mus magna amet. Posuere pulvinar neque. Ultrices donec mi dis nunc curae; inceptos phasellus congue et, sapien mollis luctus magnis magna nisl consequat dictum interdum. Egestas euismod tortor ultricies id hendrerit ipsum porttitor augue vulputate aliquam integer dis cras pellentesque. Pharetra ultrices orci montes ipsum arcu. Litora dignissim potenti senectus per fusce et posuere cubilia dolor eu hac imperdiet.</p><p>Per, donec nunc duis pretium suspendisse tristique ultrices lorem magnis pretium ultrices sed nisl odio ipsum. Venenatis phasellus, dapibus a erat inceptos parturient quam feugiat iaculis. Cubilia sagittis. Taciti habitasse fames donec nostra magnis bibendum a tortor class non. Sed feugiat. Laoreet placerat malesuada quam sociis sed feugiat vel id. Massa dui, magnis maecenas varius placerat. Ultricies cursus. Semper suspendisse parturient. Vivamus tellus praesent. A cubilia.</p><p>Amet vel nunc risus ad ad egestas sagittis a risus curae; sapien, nulla eleifend ridiculus neque nibh duis curabitur proin viverra duis gravida scelerisque sit dictum a pede et nisi aptent. Arcu libero, praesent in quam cras lorem ut, ac porttitor euismod quis.</p>', 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'terms_and_conditions_content',
            'value' => '<p>Tellus mi non felis dui euismod. Rutrum aptent. Facilisi montes integer ridiculus laoreet potenti penatibus fringilla inceptos at aptent sociosqu. Tempus ad dui quis convallis. Potenti lobortis curae; vehicula. Placerat Massa lorem adipiscing. Ultricies. Inceptos at mollis. Aliquam orci. Est malesuada inceptos placerat magna, sapien amet dui. Tellus neque.</p><p>Cras felis pretium curae; nec morbi at pellentesque quisque nonummy accumsan feugiat nostra mattis venenatis pretium ultrices justo hendrerit sociis ornare donec pulvinar Metus. Tellus vitae velit nonummy quisque venenatis suscipit vivamus cubilia elementum sociosqu a consequat risus sodales. Ridiculus conubia proin sociis inceptos cras vestibulum dictum lorem tincidunt ultrices netus. Sapien dolor ad rutrum sem pulvinar nulla porta. Ultricies pulvinar mattis enim morbi augue conubia blandit lorem imperdiet blandit risus odio lacinia nullam nec bibendum id primis vehicula cursus dictum sem ligula quis convallis etiam vitae faucibus condimentum. Tortor nullam.</p><p>Bibendum pulvinar sociosqu lobortis egestas elit montes id tortor conubia lectus. Mollis nunc maecenas mus eget. Augue aenean. Maecenas nascetur aenean venenatis enim Facilisi fames Laoreet aliquet penatibus facilisis varius mus magna amet. Posuere pulvinar neque. Ultrices donec mi dis nunc curae; inceptos phasellus congue et, sapien mollis luctus magnis magna nisl consequat dictum interdum. Egestas euismod tortor ultricies id hendrerit ipsum porttitor augue vulputate aliquam integer dis cras pellentesque. Pharetra ultrices orci montes ipsum arcu. Litora dignissim potenti senectus per fusce et posuere cubilia dolor eu hac imperdiet.</p><p>Per, donec nunc duis pretium suspendisse tristique ultrices lorem magnis pretium ultrices sed nisl odio ipsum. Venenatis phasellus, dapibus a erat inceptos parturient quam feugiat iaculis. Cubilia sagittis. Taciti habitasse fames donec nostra magnis bibendum a tortor class non. Sed feugiat. Laoreet placerat malesuada quam sociis sed feugiat vel id. Massa dui, magnis maecenas varius placerat. Ultricies cursus. Semper suspendisse parturient. Vivamus tellus praesent. A cubilia.</p><p>Amet vel nunc risus ad ad egestas sagittis a risus curae; sapien, nulla eleifend ridiculus neque nibh duis curabitur proin viverra duis gravida scelerisque sit dictum a pede et nisi aptent. Arcu libero, praesent in quam cras lorem ut, ac porttitor euismod quis.</p>', 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'contact_us_admin_email',
            'value' => 'md@enspirer.com', 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'payment_method_mode',
            'value' => 'development', 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'payment_method',
            'value' => 'paypal', 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'news_section_active',
            'value' => 1, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'contact_us_thank_you_email_note',
            'value' => '<p>lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum</p>', 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'default_currency',
            'value' => 'USD', 
            'user_id' => 1,
            ]
        );
        DB::table('settings')
        ->insert(
            [             
            'key' => 'address',
            'value' => 'No 01, Main Street, Colombo', 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'phone_number',
            'value' => '[{"number1":"0731002003"},{"number2":"0731002004"}]', 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'fax',
            'value' => '+01 11 111-1111', 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'facebook',
            'value' => 'https://www.facebook.com', 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'linkdin',
            'value' => 'https://www.linkedin.com', 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'youtube',
            'value' => 'https://www.youtube.com', 
            'user_id' => 1,
            ]
        );  
        DB::table('settings')
        ->insert(
            [             
            'key' => 'twitter',
            'value' => 'https://twitter.com', 
            'user_id' => 1,
            ]
        );  
        DB::table('settings')
        ->insert(
            [             
            'key' => 'email',
            'value' => 'info@example.com', 
            'user_id' => 1,
            ]
        );  
        
    }
}
