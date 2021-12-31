@extends('frontend.layouts.app')

@section('title', 'Agent Booking')

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ url('css/profile-settings.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endpush

@if ( session()->has('message'))

    <div style="background: #e8eeef;">
        <div class="container user-settings" style="margin-top:6rem;">
            <div class="row justify-content-between">
                <div class="col-4 left" style="background-color: #E8EEEF">
                    <div class="row">
                        <div class="col-12">
                            @include('frontend.includes.profile-settings-links')
                        </div>
                    </div>
                </div>

                <div class="col-8 ps-4 right pb-5" style="padding-top: 3rem; background-color: #F5F9FA">                    

                    <div class="row justify-content-between mt-4">
                        <div class="container-fluid jumbotron text-center" style="background-color: #c6e4ee; border-radius: 15px 50px;">
                        <h1 style="margin-top:60px;" class="display-6">Feedback Submitted Succesfully!</h1><br>
                            <hr><br>    
                            <p class="lead">
                                <a class="btn btn-success btn-md" href="{{route('frontend.user.feedback')}}" role="button">Go Back</a>
                            </p>
                            <br>
                        </div>
                    </div>  

                </div>

            </div>
        </div>
    </div> 

 @else   

    <div style="background: #e8eeef;">
        <div class="container user-settings" style="margin-top:6rem;">
            <div class="row justify-content-between">
                <div class="col-4 left" style="background-color: #E8EEEF">
                    <div class="row">
                        <div class="col-12">
                            @include('frontend.includes.profile-settings-links')
                        </div>
                    </div>
                </div>

                <div class="col-8 ps-4 right pb-5" style="padding-top: 3rem; background-color: #F5F9FA">                    

                    <div class="row justify-content-between mb-4">
                        <div class="col-12 p-0">
                            <div class="row align-items-center">
                                <div class="col-6 ps-4">
                                    <h4 class="fs-4 fw-bolder user-settings-head">Agent Booking</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(count($bookings) == 0)

                    @include('frontend.includes.not_found',[
                    'not_found_title' => 'My Booking item Not Found',
                    'not_found_description' => 'My booking item not found.please book agent for get the property',
                    'not_found_button_caption' => 'Explorer Property',
                    'not_found_link' => 'hellow rod'

                     ])

                @else
                    @foreach($bookings as $booking)
                        <div class="row">
                            <div class="col-12">
                                <div class="px-2" id="nav-properties" role="tabpanel" aria-labelledby="nav-properties-tab">
                                    <div class="row align-items-center justify-content-between mb-4 border py-3">
                                        <div class="col-5">
                                            <a href="{{ route('frontend.for_sale_single', $booking->property_id) }}"><img src="{{ uploaded_asset(App\Models\Properties::where('id',$booking->property_id)->first()->feature_image_id) }}" class="card-img-top" alt="..."></a>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="card-title mt-4">Customer Name : <span class="text-primary">{{ $booking->first_name }} {{ $booking->last_name }}</span></h6>

                                            <h5 class="card-title mt-1 mb-1">{{\App\Models\Properties::where('id',$booking->property_id)->first()->name}}</h5>

                                            <p class="card-text mb-1">Country: {{\App\Models\Country::where('id',App\Models\Properties::where('id',$booking->property_id)->first()->country)->first()->country_name }}</p>

                                            <p class="card-text mb-1">Transaction Type: {{\App\Models\Properties::where('id',$booking->property_id)->first()->transaction_type}}</p>

                                            <!-- <p class="mt-1 text-info mb-0">${{number_format(\App\Models\Properties::where('id',$booking->property_id)->first()->price,2)}}</p> -->

                                            <p class="mb-0 d-inline-block px-2 py-1 mt-2 text-light mb-1" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">{{ get_currency(request() ,App\Models\Properties::where('id',$booking->property_id)->first()->price)}}</p>


                                            <div class="row justify-content-between">
                                                <div class="col-12">
                                                    <div class="row justify-content-end">
                                                        <div class="col-4">
                                                            <button class="btn px-3 rounded-0 text-light py-1" data-bs-toggle="modal" data-bs-target="#exampleModal{{$booking->id}}" style="background-color: #4195E1">Open</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-3">
                                            <div class="card">
                                                <div class="text-center">
                                                    <img src="{{ url('files/agent_request',\App\Models\AgentRequest::where('id',$booking->agent_id)->first()->photo ) }}" class="rounded-circle card-img-top border border-2 img-fluid" alt="..." style="height: 7rem; width: 60%">
                                                </div>

                                                <div class="card-body text-center">
                                                    <h5 class="card-title text-center">{{\App\Models\AgentRequest::where('id',$booking->agent_id)->first()->name}}</h5>
                                                    <p class="card-text mb-0">{{\App\Models\AgentRequest::where('id',$booking->agent_id)->first()->email}}</p>
                                                    <p class="card-text mb-0">{{\App\Models\AgentRequest::where('id',$booking->agent_id)->first()->telephone}}</p>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Modal -->
                        <form action="{{ route('frontend.user.agent-bookings-respond') }}" method="post">
                        {{ csrf_field() }}
                            <div class="modal fade" id="exampleModal{{$booking->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">View Message</h5>
                                            <button type="button" class="btn-close mt-2" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <h4>Contact Method: {{$booking->method_of_contact}}</h4>
                                        
                                        <p class="mt-3 mb-1">Phone Number: {{$booking->phone_number}}</p>
                                        <p class="mt-3 mb-1">Email: {{$booking->email}}</p>
                                        
                                        <p class="mt-3 mb-1">Im a {{$booking->im_resident}}</p>

                                        <p class="mt-3 mb-3">Booking Date and Time (24 Hours): {{date('Y-m-d G:i', strtotime($booking->booking_time))}}</p>

                        
                                            <div class="card">
                                                <div class="card-body">
                                                    {{$booking->message}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" value="{{ $booking->id }}" name="hid_id">
                                            @if($booking->status == 'Responded')
                                                <button class="btn btn-success" disabled>Responded</button>
                                            @else
                                                <button type="submit" class="btn btn-warning">Received</button>
                                            @endif
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    @endforeach
                @endif

                </div>

            </div>
        </div>
    </div> 

@endif
@endsection


@push('after-scripts')



@endpush

