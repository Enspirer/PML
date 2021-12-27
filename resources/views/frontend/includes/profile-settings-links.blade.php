<div style="background-color: #E8EEEF">

    <div class="nav flex-column profile-settings align-items-start justify-content-start py-3" id="nav-tab" role="tablist" style="position:sticky;top:7%;height:100%;min-height:100%;overflow:hidden; padding-bottom:60px !important;">

        <h5 class="px-5 pb-2 mb-0 fw-bolder" style="font-size: 1.3rem; margin-top: 2.5rem">My Account</h5>

        <a class="nav-link border-0 ps-5 mt-3 w-100 {{ Request::segment(1) == 'dashboard' ? 'active' : null }}" id="nav-account-tab" href="{{route('frontend.user.dashboard')}}" type="button" role="tab" aria-controls="nav-account" aria-selected="false">
            <div class="row align-items-center justify-content-between">
                <div class="col-1">
                    <img src="{{ url('img/frontend/profile/account_information.png') }}" alt="">
                </div>
                <div class="col-10 ps-0">
                    <p class="text-dark fw-bold">Account Information</p>
                </div>
            </div>
        </a>

        <a class="nav-link text-dark fw-bold ps-5 w-100 {{ Request::segment(1) == 'accounts-dashboard' ? 'active' : null }}" id="nav-accountDashboard-tab" href="{{route('frontend.user.account_dashboard')}}" type="button" role="tab" aria-controls="nav-accountDashboard" aria-selected="false">
            <div class="row align-items-center justify-content-between">
                <div class="col-1">
                    <img src="{{ url('img/frontend/profile/account_dashboard.png') }}" alt="">
                </div>
                <div class="col-10 ps-0">
                    <p class="text-dark fw-bold">Account Dashboard</p>
                </div>
            </div>
        </a>

        <a class="nav-link text-dark fw-bold ps-5 w-100 {{ Request::segment(1) == 'favourites' ? 'active' : null }}" id="nav-favorite-tab" href="{{ route('frontend.user.favourites') }}" type="button" role="tab" aria-controls="nav-favorite" aria-selected="false"> 
            <div class="row align-items-center justify-content-between">
                <div class="col-1">
                    <img src="{{ url('img/frontend/profile/favorite.png') }}" alt="">
                </div>
                <div class="col-10 ps-0">
                    <p class="text-dark fw-bold">Favorite List</p>
                </div>
            </div>
        </a>

        <a class="nav-link text-dark fw-bold ps-5 w-100 {{ Request::segment(1) == 'my-bookings' ? 'active' : null }}" id="nav-favorite-tab" href="{{ route('frontend.user.my-bookings') }}" type="button" role="tab" aria-controls="nav-favorite" aria-selected="false"> 
            <div class="row align-items-center justify-content-between">
                <div class="col-1">
                    <img src="{{ url('img/frontend/profile/bookings.png') }}" alt="">
                </div>
                <div class="col-10 ps-0">
                    <p class="text-dark fw-bold">My Bookings</p>
                </div>
            </div>
        </a>

        <a class="nav-link text-dark fw-bold ps-5 w-100 {{ Request::segment(1) == 'feedback' ? 'active' : null }}" id="nav-favorite-tab" href="{{ route('frontend.user.feedback') }}" type="button" role="tab" aria-controls="nav-favorite" aria-selected="false"> 
            <div class="row align-items-center justify-content-between">
                <div class="col-1">
                    <img src="{{ url('img/frontend/profile/feedback.png') }}" alt="">
                </div>
                <div class="col-10 ps-0">
                    <p class="text-dark fw-bold">Feedback</p>
                </div>
            </div>
        </a>

        @if(App\Models\AgentRequest::where('user_id',auth()->user()->id)->first() == null)
            <a class="nav-link border-0 w-100 px-5 mt-4 text-center" id="nav-agent-tab" href="{{ route('frontend.user.agent') }}" type="button" role="tab" aria-controls="nav-agent" aria-selected="false"><button class="btn py-2 w-75 text-dark fw-bold rounded-0" style="border: 1px solid black;">Become an Agent</button></a>
        @endif

        @if(is_agent(auth()->user()->id))
            <h5 class="px-5 pb-2 mb-0 fw-bolder" style="font-size: 1.3rem; margin-top: 1.5rem">Agent</h5>

            <a class="nav-link text-dark fw-bold ps-5 w-100 {{ Request::segment(1) == 'properties' ? 'active' : null }}" id="nav-favorite-tab" href="{{ route('frontend.user.properties') }}" type="button" role="tab" aria-controls="nav-favorite" aria-selected="false"> 
                <div class="row align-items-center justify-content-between">
                    <div class="col-1">
                        <img src="{{ url('img/frontend/profile/feedback.png') }}" alt="">
                    </div>
                    <div class="col-10 ps-0">
                        <p class="text-dark fw-bold">Properties</p>
                    </div>
                </div>
            </a>

        @endif

        @if(is_country_manager(auth()->user()->id))

            <h5 class="px-5 pb-2 mb-0 fw-bolder" style="font-size: 1.3rem; margin-top: 1.5rem">Area Manager</h5>
            
            <a class="nav-link text-dark fw-bold ps-5 w-100 {{ Request::segment(1) == 'area-management-property-approval' ? 'active' : null }}" id="nav-favorite-tab" href="{{ route('frontend.user.area-management-property-approval') }}" type="button" role="tab" aria-controls="nav-favorite" aria-selected="false"> 
                <div class="row align-items-center justify-content-between">
                    <div class="col-1">
                        <img src="{{ url('img/frontend/profile/feedback.png') }}" alt="">
                    </div>
                    <div class="col-10 ps-0">
                        <p class="text-dark fw-bold">Property Approval</p>
                    </div>
                </div>
            </a>

            <a class="nav-link text-dark fw-bold ps-5 w-100 {{ Request::segment(1) == 'area-management-agent-approval' ? 'active' : null }}" id="nav-favorite-tab" href="{{ route('frontend.user.area-management-agent-approval') }}" type="button" role="tab" aria-controls="nav-favorite" aria-selected="false"> 
                <div class="row align-items-center justify-content-between">
                    <div class="col-1">
                        <img src="{{ url('img/frontend/profile/bookings.png') }}" alt="">
                    </div>
                    <div class="col-10 ps-0">
                        <p class="text-dark fw-bold">Agent Approval</p>
                    </div>
                </div>
            </a>

            <a class="nav-link text-dark fw-bold ps-5 w-100 {{ Request::segment(1) == 'area-management-supports' ? 'active' : null }}" id="nav-favorite-tab" href="{{ route('frontend.user.supports') }}" type="button" role="tab" aria-controls="nav-favorite" aria-selected="false"> 
                <div class="row align-items-center justify-content-between">
                    <div class="col-1">
                        <img src="{{ url('img/frontend/profile/bookings.png') }}" alt="">
                    </div>
                    <div class="col-10 ps-0">
                        <p class="text-dark fw-bold">Help and Supports</p>
                    </div>
                </div>
            </a>

        @endif

        <h5 class="px-5 pb-2 mb-0 fw-bolder" style="font-size: 1.3rem; margin-top: 1.5rem">Settings</h5>

        <!-- <a class="nav-link text-dark fw-bold ps-5 w-100 {{ Request::segment(1) == 'settings' ? 'active' : null }}" id="nav-favorite-tab" href="" type="button" role="tab" aria-controls="nav-favorite" aria-selected="false">
            <div class="row align-items-center justify-content-between">
                <div class="col-1">
                    <img src="{{ url('img/frontend/profile/settings.png') }}" alt="">
                </div>
                <div class="col-10 ps-0">
                    <p class="text-dark fw-bold">Settings</p>
                </div>
            </div>
        </a> -->

        <a class="nav-link text-dark fw-bold ps-5 w-100 {{ Request::segment(1) == 'logout' ? 'active' : null }}" id="nav-favorite-tab" href="{{url('logout')}}" type="button" role="tab" aria-controls="nav-favorite" aria-selected="false"> 
            <div class="row align-items-center justify-content-between">
                <div class="col-1">
                    <img src="{{ url('img/frontend/profile/sign_out.png') }}" alt="">
                </div>
                <div class="col-10 ps-0">
                    <p class="text-dark fw-bold">Sign Out</p>
                </div>
            </div>
        </a>

    </div>
</div>