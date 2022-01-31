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
            'value' => '[{"number":"0731002003"},{"number":"0731002004"}]', 
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
        DB::table('settings')
        ->insert(
            [             
            'key' => 'sidebar_advertiment_1',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'sidebar_advertiment_description_1',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'sidebar_advertiment_link_1',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'sidebar_advertiment_2',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'sidebar_advertiment_description_2',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'sidebar_advertiment_link_2',
            'value' => null, 
            'user_id' => 1,
            ]
        );         
        DB::table('settings')
        ->insert(
            [             
            'key' => 'property_page_advertiment_1',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'property_page_description_1',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'property_page_link_1',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'property_page_advertiment_2',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'property_page_description_2',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'property_page_link_2',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'property_page_advertiment_3',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'property_page_description_3',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'property_page_link_3',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'agents_page_advertiment_1',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'agents_page_description_1',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'agents_page_link_1',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'agents_page_advertiment_2',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'agents_page_description_2',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'agents_page_link_2',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'agents_page_advertiment_3',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'agents_page_description_3',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'agents_page_link_3',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'menu_type_1',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'menu_type_2',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'menu_type_3',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'solo_property_advertiment_1',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'solo_property_advertiment_description_1',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'solo_property_advertiment_link_1',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'solo_property_advertiment_2',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'solo_property_advertiment_description_2',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'solo_property_advertiment_link_2',
            'value' => null, 
            'user_id' => 1,
            ]
        );   
        DB::table('settings')
        ->insert(
            [             
            'key' => 'solo_agent_advertiment_1',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'solo_agent_advertiment_description_1',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'solo_agent_advertiment_link_1',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'solo_agent_advertiment_2',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'solo_agent_advertiment_description_2',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'solo_agent_advertiment_link_2',
            'value' => null, 
            'user_id' => 1,
            ]
        );  
        DB::table('settings')
        ->insert(
            [             
            'key' => 'home_page_featured',
            'value' => null, 
            'user_id' => 1,
            ]
        );  
        DB::table('settings')
        ->insert(
            [             
            'key' => 'home_page_latest',
            'value' => null, 
            'user_id' => 1,
            ]
        );
        DB::table('settings')
        ->insert(
            [             
            'key' => 'property_talk_featured',
            'value' => null, 
            'user_id' => 1,
            ]
        );
        DB::table('settings')
        ->insert(
            [             
            'key' => 'home_loan_advertisment',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'home_loan_advertisment_description',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'home_loan_advertisment_link',
            'value' => null, 
            'user_id' => 1,
            ]
        );  
        DB::table('settings')
        ->insert(
            [             
            'key' => 'home_loan_advertisment_2',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'home_loan_advertisment_description_2',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'home_loan_advertisment_link_2',
            'value' => null, 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'tips_for_buyers_content',
            'value' => '<p>Tellus mi non felis dui euismod. Rutrum aptent. Facilisi montes integer ridiculus laoreet potenti penatibus fringilla inceptos at aptent sociosqu. Tempus ad dui quis convallis. Potenti lobortis curae; vehicula. Placerat Massa lorem adipiscing. Ultricies. Inceptos at mollis. Aliquam orci. Est malesuada inceptos placerat magna, sapien amet dui. Tellus neque.</p><p>Cras felis pretium curae; nec morbi at pellentesque quisque nonummy accumsan feugiat nostra mattis venenatis pretium ultrices justo hendrerit sociis ornare donec pulvinar Metus. Tellus vitae velit nonummy quisque venenatis suscipit vivamus cubilia elementum sociosqu a consequat risus sodales. Ridiculus conubia proin sociis inceptos cras vestibulum dictum lorem tincidunt ultrices netus. Sapien dolor ad rutrum sem pulvinar nulla porta. Ultricies pulvinar mattis enim morbi augue conubia blandit lorem imperdiet blandit risus odio lacinia nullam nec bibendum id primis vehicula cursus dictum sem ligula quis convallis etiam vitae faucibus condimentum. Tortor nullam.</p><p>Bibendum pulvinar sociosqu lobortis egestas elit montes id tortor conubia lectus. Mollis nunc maecenas mus eget. Augue aenean. Maecenas nascetur aenean venenatis enim Facilisi fames Laoreet aliquet penatibus facilisis varius mus magna amet. Posuere pulvinar neque. Ultrices donec mi dis nunc curae; inceptos phasellus congue et, sapien mollis luctus magnis magna nisl consequat dictum interdum. Egestas euismod tortor ultricies id hendrerit ipsum porttitor augue vulputate aliquam integer dis cras pellentesque. Pharetra ultrices orci montes ipsum arcu. Litora dignissim potenti senectus per fusce et posuere cubilia dolor eu hac imperdiet.</p><p>Per, donec nunc duis pretium suspendisse tristique ultrices lorem magnis pretium ultrices sed nisl odio ipsum. Venenatis phasellus, dapibus a erat inceptos parturient quam feugiat iaculis. Cubilia sagittis. Taciti habitasse fames donec nostra magnis bibendum a tortor class non. Sed feugiat. Laoreet placerat malesuada quam sociis sed feugiat vel id. Massa dui, magnis maecenas varius placerat. Ultricies cursus. Semper suspendisse parturient. Vivamus tellus praesent. A cubilia.</p><p>Amet vel nunc risus ad ad egestas sagittis a risus curae; sapien, nulla eleifend ridiculus neque nibh duis curabitur proin viverra duis gravida scelerisque sit dictum a pede et nisi aptent. Arcu libero, praesent in quam cras lorem ut, ac porttitor euismod quis. Auctor. Congue tortor ac condimentum dis malesuada platea lacinia. Taciti in. Nec. Quam convallis ultrices. Sollicitudin magna dolor ultricies platea sit, neque non, turpis cursus cum nulla litora, morbi nascetur ac phasellus fermentum ultricies. Non massa arcu Montes nullam.</p><p>Aliquet bibendum a netus arcu scelerisque lacinia donec tellus. Neque Accumsan convallis auctor euismod, conubia. Sed eleifend, fermentum vitae habitasse ultricies, platea arcu est turpis vulputate nam faucibus cras augue dapibus. Quisque aenean placerat. Potenti volutpat habitasse ipsum. Nullam laoreet conubia vivamus vivamus non montes eleifend facilisis eleifend inceptos egestas molestie luctus nec blandit feugiat sociosqu.</p><p>Auctor consequat dapibus in donec consectetuer taciti malesuada cras, felis eu nostra laoreet eu etiam primis ad integer Hymenaeos laoreet curabitur pellentesque mattis senectus vel cum. Class cum accumsan libero commodo at natoque aliquam, habitasse. Purus, lacinia felis a lorem inceptos montes maecenas. Felis porta mus. Dapibus suscipit taciti mauris felis. Praesent tristique ornare neque sodales sollicitudin. Malesuada semper adipiscing tempor, fringilla tempor nonummy at quam. Imperdiet conubia dictum purus Vulputate accumsan. Hendrerit fringilla cras libero elit. Enim diam magna cubilia. Mattis.</p><p>Quisque aliquet commodo fames erat. Conubia nulla magna nonummy. Congue dis dui nibh felis vivamus maecenas laoreet, sociis mattis mattis inceptos dignissim morbi Rhoncus sollicitudin praesent quam praesent litora auctor consectetuer ligula turpis mattis rhoncus in tincidunt enim risus per.</p><p>Diam in, dictumst iaculis vel cursus, phasellus pellentesque. Lobortis metus cum duis magnis cubilia dictumst. Duis justo purus. Facilisi ligula donec vel nulla non donec. Massa neque nulla diam faucibus senectus conubia hac tellus parturient nascetur sociis parturient conubia porta sodales fames lacinia tincidunt ligula lectus.</p><p>Ultrices tristique convallis litora risus vel pede lobortis litora faucibus. Eu viverra. Ac netus torquent scelerisque nibh habitant egestas mattis velit. Egestas, magna mattis etiam. Pellentesque tempus morbi quisque per nulla amet sem sagittis urna ultrices mollis. Quisque mus. Tellus consequat, odio, interdum nulla duis nisi auctor semper facilisi maecenas ligula sagittis dapibus fames nonummy. Enim ultrices pellentesque diam parturient viverra lacinia nibh molestie auctor quisque scelerisque eros ullamcorper hac. Ornare laoreet adipiscing dapibus dictum nulla mi, penatibus magnis netus libero fusce lorem vitae congue eleifend tristique. Semper fusce tristique tempus tellus at. Ac senectus cum accumsan sodales magnis.</p>', 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'tips_for_sellers_content',
            'value' => '<p>Tellus mi non felis dui euismod. Rutrum aptent. Facilisi montes integer ridiculus laoreet potenti penatibus fringilla inceptos at aptent sociosqu. Tempus ad dui quis convallis. Potenti lobortis curae; vehicula. Placerat Massa lorem adipiscing. Ultricies. Inceptos at mollis. Aliquam orci. Est malesuada inceptos placerat magna, sapien amet dui. Tellus neque.</p><p>Cras felis pretium curae; nec morbi at pellentesque quisque nonummy accumsan feugiat nostra mattis venenatis pretium ultrices justo hendrerit sociis ornare donec pulvinar Metus. Tellus vitae velit nonummy quisque venenatis suscipit vivamus cubilia elementum sociosqu a consequat risus sodales. Ridiculus conubia proin sociis inceptos cras vestibulum dictum lorem tincidunt ultrices netus. Sapien dolor ad rutrum sem pulvinar nulla porta. Ultricies pulvinar mattis enim morbi augue conubia blandit lorem imperdiet blandit risus odio lacinia nullam nec bibendum id primis vehicula cursus dictum sem ligula quis convallis etiam vitae faucibus condimentum. Tortor nullam.</p><p>Bibendum pulvinar sociosqu lobortis egestas elit montes id tortor conubia lectus. Mollis nunc maecenas mus eget. Augue aenean. Maecenas nascetur aenean venenatis enim Facilisi fames Laoreet aliquet penatibus facilisis varius mus magna amet. Posuere pulvinar neque. Ultrices donec mi dis nunc curae; inceptos phasellus congue et, sapien mollis luctus magnis magna nisl consequat dictum interdum. Egestas euismod tortor ultricies id hendrerit ipsum porttitor augue vulputate aliquam integer dis cras pellentesque. Pharetra ultrices orci montes ipsum arcu. Litora dignissim potenti senectus per fusce et posuere cubilia dolor eu hac imperdiet.</p><p>Per, donec nunc duis pretium suspendisse tristique ultrices lorem magnis pretium ultrices sed nisl odio ipsum. Venenatis phasellus, dapibus a erat inceptos parturient quam feugiat iaculis. Cubilia sagittis. Taciti habitasse fames donec nostra magnis bibendum a tortor class non. Sed feugiat. Laoreet placerat malesuada quam sociis sed feugiat vel id. Massa dui, magnis maecenas varius placerat. Ultricies cursus. Semper suspendisse parturient. Vivamus tellus praesent. A cubilia.</p><p>Amet vel nunc risus ad ad egestas sagittis a risus curae; sapien, nulla eleifend ridiculus neque nibh duis curabitur proin viverra duis gravida scelerisque sit dictum a pede et nisi aptent. Arcu libero, praesent in quam cras lorem ut, ac porttitor euismod quis. Auctor. Congue tortor ac condimentum dis malesuada platea lacinia. Taciti in. Nec. Quam convallis ultrices. Sollicitudin magna dolor ultricies platea sit, neque non, turpis cursus cum nulla litora, morbi nascetur ac phasellus fermentum ultricies. Non massa arcu Montes nullam.</p><p>Aliquet bibendum a netus arcu scelerisque lacinia donec tellus. Neque Accumsan convallis auctor euismod, conubia. Sed eleifend, fermentum vitae habitasse ultricies, platea arcu est turpis vulputate nam faucibus cras augue dapibus. Quisque aenean placerat. Potenti volutpat habitasse ipsum. Nullam laoreet conubia vivamus vivamus non montes eleifend facilisis eleifend inceptos egestas molestie luctus nec blandit feugiat sociosqu.</p><p>Auctor consequat dapibus in donec consectetuer taciti malesuada cras, felis eu nostra laoreet eu etiam primis ad integer Hymenaeos laoreet curabitur pellentesque mattis senectus vel cum. Class cum accumsan libero commodo at natoque aliquam, habitasse. Purus, lacinia felis a lorem inceptos montes maecenas. Felis porta mus. Dapibus suscipit taciti mauris felis. Praesent tristique ornare neque sodales sollicitudin. Malesuada semper adipiscing tempor, fringilla tempor nonummy at quam. Imperdiet conubia dictum purus Vulputate accumsan. Hendrerit fringilla cras libero elit. Enim diam magna cubilia. Mattis.</p><p>Quisque aliquet commodo fames erat. Conubia nulla magna nonummy. Congue dis dui nibh felis vivamus maecenas laoreet, sociis mattis mattis inceptos dignissim morbi Rhoncus sollicitudin praesent quam praesent litora auctor consectetuer ligula turpis mattis rhoncus in tincidunt enim risus per.</p><p>Diam in, dictumst iaculis vel cursus, phasellus pellentesque. Lobortis metus cum duis magnis cubilia dictumst. Duis justo purus. Facilisi ligula donec vel nulla non donec. Massa neque nulla diam faucibus senectus conubia hac tellus parturient nascetur sociis parturient conubia porta sodales fames lacinia tincidunt ligula lectus.</p><p>Ultrices tristique convallis litora risus vel pede lobortis litora faucibus. Eu viverra. Ac netus torquent scelerisque nibh habitant egestas mattis velit. Egestas, magna mattis etiam. Pellentesque tempus morbi quisque per nulla amet sem sagittis urna ultrices mollis. Quisque mus. Tellus consequat, odio, interdum nulla duis nisi auctor semper facilisi maecenas ligula sagittis dapibus fames nonummy. Enim ultrices pellentesque diam parturient viverra lacinia nibh molestie auctor quisque scelerisque eros ullamcorper hac. Ornare laoreet adipiscing dapibus dictum nulla mi, penatibus magnis netus libero fusce lorem vitae congue eleifend tristique. Semper fusce tristique tempus tellus at. Ac senectus cum accumsan sodales magnis.</p>', 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'commercial_resources_content',
            'value' => '<p>Tellus mi non felis dui euismod. Rutrum aptent. Facilisi montes integer ridiculus laoreet potenti penatibus fringilla inceptos at aptent sociosqu. Tempus ad dui quis convallis. Potenti lobortis curae; vehicula. Placerat Massa lorem adipiscing. Ultricies. Inceptos at mollis. Aliquam orci. Est malesuada inceptos placerat magna, sapien amet dui. Tellus neque.</p><p>Cras felis pretium curae; nec morbi at pellentesque quisque nonummy accumsan feugiat nostra mattis venenatis pretium ultrices justo hendrerit sociis ornare donec pulvinar Metus. Tellus vitae velit nonummy quisque venenatis suscipit vivamus cubilia elementum sociosqu a consequat risus sodales. Ridiculus conubia proin sociis inceptos cras vestibulum dictum lorem tincidunt ultrices netus. Sapien dolor ad rutrum sem pulvinar nulla porta. Ultricies pulvinar mattis enim morbi augue conubia blandit lorem imperdiet blandit risus odio lacinia nullam nec bibendum id primis vehicula cursus dictum sem ligula quis convallis etiam vitae faucibus condimentum. Tortor nullam.</p><p>Bibendum pulvinar sociosqu lobortis egestas elit montes id tortor conubia lectus. Mollis nunc maecenas mus eget. Augue aenean. Maecenas nascetur aenean venenatis enim Facilisi fames Laoreet aliquet penatibus facilisis varius mus magna amet. Posuere pulvinar neque. Ultrices donec mi dis nunc curae; inceptos phasellus congue et, sapien mollis luctus magnis magna nisl consequat dictum interdum. Egestas euismod tortor ultricies id hendrerit ipsum porttitor augue vulputate aliquam integer dis cras pellentesque. Pharetra ultrices orci montes ipsum arcu. Litora dignissim potenti senectus per fusce et posuere cubilia dolor eu hac imperdiet.</p><p>Per, donec nunc duis pretium suspendisse tristique ultrices lorem magnis pretium ultrices sed nisl odio ipsum. Venenatis phasellus, dapibus a erat inceptos parturient quam feugiat iaculis. Cubilia sagittis. Taciti habitasse fames donec nostra magnis bibendum a tortor class non. Sed feugiat. Laoreet placerat malesuada quam sociis sed feugiat vel id. Massa dui, magnis maecenas varius placerat. Ultricies cursus. Semper suspendisse parturient. Vivamus tellus praesent. A cubilia.</p><p>Amet vel nunc risus ad ad egestas sagittis a risus curae; sapien, nulla eleifend ridiculus neque nibh duis curabitur proin viverra duis gravida scelerisque sit dictum a pede et nisi aptent. Arcu libero, praesent in quam cras lorem ut, ac porttitor euismod quis. Auctor. Congue tortor ac condimentum dis malesuada platea lacinia. Taciti in. Nec. Quam convallis ultrices. Sollicitudin magna dolor ultricies platea sit, neque non, turpis cursus cum nulla litora, morbi nascetur ac phasellus fermentum ultricies. Non massa arcu Montes nullam.</p><p>Aliquet bibendum a netus arcu scelerisque lacinia donec tellus. Neque Accumsan convallis auctor euismod, conubia. Sed eleifend, fermentum vitae habitasse ultricies, platea arcu est turpis vulputate nam faucibus cras augue dapibus. Quisque aenean placerat. Potenti volutpat habitasse ipsum. Nullam laoreet conubia vivamus vivamus non montes eleifend facilisis eleifend inceptos egestas molestie luctus nec blandit feugiat sociosqu.</p><p>Auctor consequat dapibus in donec consectetuer taciti malesuada cras, felis eu nostra laoreet eu etiam primis ad integer Hymenaeos laoreet curabitur pellentesque mattis senectus vel cum. Class cum accumsan libero commodo at natoque aliquam, habitasse. Purus, lacinia felis a lorem inceptos montes maecenas. Felis porta mus. Dapibus suscipit taciti mauris felis. Praesent tristique ornare neque sodales sollicitudin. Malesuada semper adipiscing tempor, fringilla tempor nonummy at quam. Imperdiet conubia dictum purus Vulputate accumsan. Hendrerit fringilla cras libero elit. Enim diam magna cubilia. Mattis.</p><p>Quisque aliquet commodo fames erat. Conubia nulla magna nonummy. Congue dis dui nibh felis vivamus maecenas laoreet, sociis mattis mattis inceptos dignissim morbi Rhoncus sollicitudin praesent quam praesent litora auctor consectetuer ligula turpis mattis rhoncus in tincidunt enim risus per.</p><p>Diam in, dictumst iaculis vel cursus, phasellus pellentesque. Lobortis metus cum duis magnis cubilia dictumst. Duis justo purus. Facilisi ligula donec vel nulla non donec. Massa neque nulla diam faucibus senectus conubia hac tellus parturient nascetur sociis parturient conubia porta sodales fames lacinia tincidunt ligula lectus.</p><p>Ultrices tristique convallis litora risus vel pede lobortis litora faucibus. Eu viverra. Ac netus torquent scelerisque nibh habitant egestas mattis velit. Egestas, magna mattis etiam. Pellentesque tempus morbi quisque per nulla amet sem sagittis urna ultrices mollis. Quisque mus. Tellus consequat, odio, interdum nulla duis nisi auctor semper facilisi maecenas ligula sagittis dapibus fames nonummy. Enim ultrices pellentesque diam parturient viverra lacinia nibh molestie auctor quisque scelerisque eros ullamcorper hac. Ornare laoreet adipiscing dapibus dictum nulla mi, penatibus magnis netus libero fusce lorem vitae congue eleifend tristique. Semper fusce tristique tempus tellus at. Ac senectus cum accumsan sodales magnis.</p>', 
            'user_id' => 1,
            ]
        ); 
        DB::table('settings')
        ->insert(
            [             
            'key' => 'marketing_services_content',
            'value' => '<p>Tellus mi non felis dui euismod. Rutrum aptent. Facilisi montes integer ridiculus laoreet potenti penatibus fringilla inceptos at aptent sociosqu. Tempus ad dui quis convallis. Potenti lobortis curae; vehicula. Placerat Massa lorem adipiscing. Ultricies. Inceptos at mollis. Aliquam orci. Est malesuada inceptos placerat magna, sapien amet dui. Tellus neque.</p><p>Cras felis pretium curae; nec morbi at pellentesque quisque nonummy accumsan feugiat nostra mattis venenatis pretium ultrices justo hendrerit sociis ornare donec pulvinar Metus. Tellus vitae velit nonummy quisque venenatis suscipit vivamus cubilia elementum sociosqu a consequat risus sodales. Ridiculus conubia proin sociis inceptos cras vestibulum dictum lorem tincidunt ultrices netus. Sapien dolor ad rutrum sem pulvinar nulla porta. Ultricies pulvinar mattis enim morbi augue conubia blandit lorem imperdiet blandit risus odio lacinia nullam nec bibendum id primis vehicula cursus dictum sem ligula quis convallis etiam vitae faucibus condimentum. Tortor nullam.</p><p>Bibendum pulvinar sociosqu lobortis egestas elit montes id tortor conubia lectus. Mollis nunc maecenas mus eget. Augue aenean. Maecenas nascetur aenean venenatis enim Facilisi fames Laoreet aliquet penatibus facilisis varius mus magna amet. Posuere pulvinar neque. Ultrices donec mi dis nunc curae; inceptos phasellus congue et, sapien mollis luctus magnis magna nisl consequat dictum interdum. Egestas euismod tortor ultricies id hendrerit ipsum porttitor augue vulputate aliquam integer dis cras pellentesque. Pharetra ultrices orci montes ipsum arcu. Litora dignissim potenti senectus per fusce et posuere cubilia dolor eu hac imperdiet.</p><p>Per, donec nunc duis pretium suspendisse tristique ultrices lorem magnis pretium ultrices sed nisl odio ipsum. Venenatis phasellus, dapibus a erat inceptos parturient quam feugiat iaculis. Cubilia sagittis. Taciti habitasse fames donec nostra magnis bibendum a tortor class non. Sed feugiat. Laoreet placerat malesuada quam sociis sed feugiat vel id. Massa dui, magnis maecenas varius placerat. Ultricies cursus. Semper suspendisse parturient. Vivamus tellus praesent. A cubilia.</p><p>Amet vel nunc risus ad ad egestas sagittis a risus curae; sapien, nulla eleifend ridiculus neque nibh duis curabitur proin viverra duis gravida scelerisque sit dictum a pede et nisi aptent. Arcu libero, praesent in quam cras lorem ut, ac porttitor euismod quis. Auctor. Congue tortor ac condimentum dis malesuada platea lacinia. Taciti in. Nec. Quam convallis ultrices. Sollicitudin magna dolor ultricies platea sit, neque non, turpis cursus cum nulla litora, morbi nascetur ac phasellus fermentum ultricies. Non massa arcu Montes nullam.</p><p>Aliquet bibendum a netus arcu scelerisque lacinia donec tellus. Neque Accumsan convallis auctor euismod, conubia. Sed eleifend, fermentum vitae habitasse ultricies, platea arcu est turpis vulputate nam faucibus cras augue dapibus. Quisque aenean placerat. Potenti volutpat habitasse ipsum. Nullam laoreet conubia vivamus vivamus non montes eleifend facilisis eleifend inceptos egestas molestie luctus nec blandit feugiat sociosqu.</p><p>Auctor consequat dapibus in donec consectetuer taciti malesuada cras, felis eu nostra laoreet eu etiam primis ad integer Hymenaeos laoreet curabitur pellentesque mattis senectus vel cum. Class cum accumsan libero commodo at natoque aliquam, habitasse. Purus, lacinia felis a lorem inceptos montes maecenas. Felis porta mus. Dapibus suscipit taciti mauris felis. Praesent tristique ornare neque sodales sollicitudin. Malesuada semper adipiscing tempor, fringilla tempor nonummy at quam. Imperdiet conubia dictum purus Vulputate accumsan. Hendrerit fringilla cras libero elit. Enim diam magna cubilia. Mattis.</p><p>Quisque aliquet commodo fames erat. Conubia nulla magna nonummy. Congue dis dui nibh felis vivamus maecenas laoreet, sociis mattis mattis inceptos dignissim morbi Rhoncus sollicitudin praesent quam praesent litora auctor consectetuer ligula turpis mattis rhoncus in tincidunt enim risus per.</p><p>Diam in, dictumst iaculis vel cursus, phasellus pellentesque. Lobortis metus cum duis magnis cubilia dictumst. Duis justo purus. Facilisi ligula donec vel nulla non donec. Massa neque nulla diam faucibus senectus conubia hac tellus parturient nascetur sociis parturient conubia porta sodales fames lacinia tincidunt ligula lectus.</p><p>Ultrices tristique convallis litora risus vel pede lobortis litora faucibus. Eu viverra. Ac netus torquent scelerisque nibh habitant egestas mattis velit. Egestas, magna mattis etiam. Pellentesque tempus morbi quisque per nulla amet sem sagittis urna ultrices mollis. Quisque mus. Tellus consequat, odio, interdum nulla duis nisi auctor semper facilisi maecenas ligula sagittis dapibus fames nonummy. Enim ultrices pellentesque diam parturient viverra lacinia nibh molestie auctor quisque scelerisque eros ullamcorper hac. Ornare laoreet adipiscing dapibus dictum nulla mi, penatibus magnis netus libero fusce lorem vitae congue eleifend tristique. Semper fusce tristique tempus tellus at. Ac senectus cum accumsan sodales magnis.</p>', 
            'user_id' => 1,
            ]
        ); 
    }
}
