<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                @lang('menus.backend.sidebar.general')
            </li>
            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Route::is('admin/dashboard'))
                }}" href="{{ route('admin.dashboard') }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    @lang('menus.backend.sidebar.dashboard')
                </a>
            </li>

            <li class="nav-item nav-dropdown ">
                <a class="nav-link nav-dropdown-toggle " href="#">
                    <i class="nav-icon fas fa-flag"></i> 
                    Countries
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/country'))}}" href="{{ route('admin.country.index') }}">
                            Countries
                        </a>
                    </li>                      
                </ul>
            </li>

            <li class="nav-item nav-dropdown ">
                <a class="nav-link nav-dropdown-toggle " href="#">
                    <i class="nav-icon fas fa-map-marker-alt"></i>
                        Area
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/location'))}}" href="{{ route('admin.location.index') }}">
                            Locations Area
                        </a>
                    </li> 
                </ul>
            </li>

            <li class="nav-item nav-dropdown ">
                <a class="nav-link nav-dropdown-toggle " href="#">
                    <i class="nav-icon fas fa-building"></i>
                    Properties
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/property'))}}" href="{{ route('admin.property.index') }}">
                            Property List
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/free_listning'))}}" href="{{ route('admin.free_listning.index') }}">
                            Free Listning
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/property_type'))}}" href="{{ route('admin.property_type.index') }}">
                            Property Type
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/sold_properties'))}}" href="{{ route('admin.sold_properties.index') }}">
                            Sold Properties Request
                        </a>
                    </li>                        
                </ul>
            </li>
            
            <li class="nav-item nav-dropdown ">
                <a class="nav-link nav-dropdown-toggle " href="#">
                    <i class="nav-icon fas fa-user-tie"></i>
                    Agents
                </a>

                <ul class="nav-dropdown-items">   
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/agent'))}}" href="{{ route('admin.agent.index') }}">
                            Agents
                        </a>
                    </li>                
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/agent_request'))}}" href="{{ route('admin.agent_request.index') }}">
                            Agent Request
                        </a>
                    </li>                        
                </ul>
            </li> 

            <li class="nav-item nav-dropdown ">
                <a class="nav-link nav-dropdown-toggle " href="#">
                    <i class="nav-icon far fa-newspaper"></i>
                    Property News
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/property_news'))}}" href="{{ route('admin.property_news.index') }}">
                            News
                        </a>
                    </li> 
                </ul>
            </li> 
           
            <li class="nav-item nav-dropdown ">
                <a class="nav-link nav-dropdown-toggle " href="#">
                    <i class="nav-icon fas fa-list"></i>
                    Property Talk
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/category'))}}" href="{{ route('admin.category.index') }}">
                            Industry
                        </a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/post'))}}" href="{{ route('admin.post.index') }}">
                            Articles
                        </a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/pro_tal_settings'))}}" href="{{ route('admin.pro_tal_settings') }}">
                            Settings
                        </a>
                    </li> 
                </ul>
            </li> 
            
            <li class="nav-item nav-dropdown ">
                <a class="nav-link nav-dropdown-toggle " href="#">
                    <i class="nav-icon fas fa-scroll"></i>
                    Advertisements
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/sidebar_ad'))}}" href="{{ route('admin.sidebar_ad.index') }}">
                            Home Page
                        </a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/property_page_ad'))}}" href="{{ route('admin.property_page_ad.index') }}">
                            Property Page
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/solo_property_ad'))}}" href="{{ route('admin.solo_property_ad.index') }}">
                            Individual Property Page
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/agents_page_ad'))}}" href="{{ route('admin.agents_page_ad.index') }}">
                            Agents Page
                        </a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/solo_agent_ad'))}}" href="{{ route('admin.solo_agent_ad.index') }}">
                            Individual Agent Page
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/homeloan_ad'))}}" href="{{ route('admin.homeloan_ad.index') }}">
                            Blog Page
                        </a>
                    </li> 
                </ul>
            </li>
            

            <li class="nav-item">
                <a class="nav-link {{active_class(Route::is('admin/file_manager'))}}" href="{{ route('admin.file_manager.index') }}">
                <i class="nav-icon fas fa-folder-open"></i>
                    File Manager
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{active_class(Route::is('admin/contact_us'))}}" href="{{ route('admin.contact_us.index') }}">
                    <i class="nav-icon fas fa-comments"></i>
                    Contact Us
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{active_class(Route::is('admin/search'))}}" href="{{ route('admin.search.index') }}">
                    <i class="nav-icon fas fa-search"></i>
                    Search
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{active_class(Route::is('admin/subscribed_emails'))}}" href="{{ route('admin.subscribed_emails.index') }}">
                    <i class="nav-icon fas fa-envelope-open-text"></i>
                    Subscribed Emails
                </a>
            </li>

            <li class="nav-item nav-dropdown ">
                <a class="nav-link nav-dropdown-toggle " href="#">
                    <i class="nav-icon fas fa-question-circle"></i>
                    Help & Supports
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/help_category'))}}" href="{{ route('admin.help_category.index') }}">
                            Category
                        </a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/help_supports'))}}" href="{{ route('admin.help_supports.index') }}">
                            Help & Supports
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown ">
                <a class="nav-link nav-dropdown-toggle " href="#">
                    <i class="nav-icon fas fa-book-open"></i>
                    Pages
                </a>

                <ul class="nav-dropdown-items">
                    
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/tips_for_buyers'))}}" href="{{ route('admin.tips_for_buyers') }}">
                            Tips for buyers
                        </a>
                    </li>                    
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/tips_for_sellers'))}}" href="{{ route('admin.tips_for_sellers') }}">
                            Tips for sellers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/commercial_resources'))}}" href="{{ route('admin.commercial_resources') }}">
                            Commercial Resources
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/marketing_services'))}}" href="{{ route('admin.marketing_services') }}">
                            Marketing Services
                        </a>
                    </li>
                        
                </ul>
            </li> 

            @if ($logged_in_user->isAdmin())
                <li class="nav-title">
                    @lang('menus.backend.sidebar.system')
                </li>

                <li class="nav-item nav-dropdown ">
                    <a class="nav-link nav-dropdown-toggle " href="#">
                        <i class="nav-icon fas fa-cog"></i>
                        Settings
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{active_class(Route::is('admin/settings'))}}" href="{{ route('admin.settings.index') }}">                        
                                General Settings
                            </a>  
                        </li>  
                        <li class="nav-item">
                            <a class="nav-link {{active_class(Route::is('admin/about_us'))}}" href="{{ route('admin.about_us') }}">
                                About Us
                            </a>
                        </li>                    
                        <li class="nav-item">
                            <a class="nav-link {{active_class(Route::is('admin/privacy_policy'))}}" href="{{ route('admin.privacy_policy') }}">
                                Privacy Policy
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{active_class(Route::is('admin/terms_and_conditions'))}}" href="{{ route('admin.terms_and_conditions') }}">
                                Terms and Conditions
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{active_class(Route::is('admin/contactus_thanks'))}}" href="{{ route('admin.contactus_thanks') }}">
                                Contact Us Thanks Email
                            </a>
                        </li>               
                        <li class="nav-item">
                            <a class="nav-link {{active_class(Route::is('admin/home_page_features/create'))}}" href="{{ route('admin.home_page_features.create') }}">
                                Home Page Features
                            </a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link {{active_class(Route::is('admin/home_page_latest/create'))}}" href="{{ route('admin.home_page_latest.create') }}">
                                Home Page Latest
                            </a>
                        </li>       
                        <li class="nav-item">
                            <a class="nav-link {{active_class(Route::is('admin/watermark'))}}" href="{{ route('admin.watermark') }}">
                                Watermark
                            </a>
                        </li>    
                    </ul>
                </li>

                <li class="nav-item nav-dropdown {{
                    active_class(Route::is('admin/auth*'), 'open')
                }}">
                    <a class="nav-link nav-dropdown-toggle {{
                        active_class(Route::is('admin/auth*'))
                    }}" href="#">
                        <i class="nav-icon far fa-user"></i>
                        @lang('menus.backend.access.title')

                        @if ($pending_approval > 0)
                            <span class="badge badge-danger">{{ $pending_approval }}</span>
                        @endif
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{
                                active_class(Route::is('admin/auth/user*'))
                            }}" href="{{ route('admin.auth.user.index') }}">
                                @lang('labels.backend.access.users.management')

                                @if ($pending_approval > 0)
                                    <span class="badge badge-danger">{{ $pending_approval }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{
                                active_class(Route::is('admin/auth/role*'))
                            }}" href="{{ route('admin.auth.role.index') }}">
                                @lang('labels.backend.access.roles.management')
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="divider"></li>

                <li class="nav-item nav-dropdown {{
                    active_class(Route::is('admin/log-viewer*'), 'open')
                }}">
                        <a class="nav-link nav-dropdown-toggle {{
                            active_class(Route::is('admin/log-viewer*'))
                        }}" href="#">
                        <i class="nav-icon fas fa-list"></i> @lang('menus.backend.log-viewer.main')
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{
                            active_class(Route::is('admin/log-viewer'))
                        }}" href="{{ route('log-viewer::dashboard') }}">
                                @lang('menus.backend.log-viewer.dashboard')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{
                            active_class(Route::is('admin/log-viewer/logs*'))
                        }}" href="{{ route('log-viewer::logs.list') }}">
                                @lang('menus.backend.log-viewer.logs')
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div><!--sidebar-->
