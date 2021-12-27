@extends('frontend.layouts.app')

@section('title', 'Feedbacks')

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
                                    <h4 class="fs-4 fw-bolder user-settings-head">Feedback Form</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="px-2" id="nav-agent" role="tabpanel" aria-labelledby="nav-agent-tab">
                                <div class="row align-items-center justify-content-between mb-4 border py-3">
                                    <h5 class="mb-3">Add Your Feedback</h5>
                                    <br>
                                
                                    <form action="{{route('frontend.user.feedback.store')}}" method="post" enctype="multipart/form-data" >
                                    {{csrf_field()}}
                                        <div class="row mb-3">                                    
                                            <div class="col-6">
                                                <div>
                                                    <label for="name" class="form-label mb-0 required">Name</label>
                                                    <input type="text" class="form-control" name="name" value="{{ $user_details->first_name.' '.$user_details->last_name }}" required>
                                                </div>  
                                            </div>
                                            <div class="col-6">
                                                <div>
                                                    <label class="form-label mb-0 required">Country</label>
                                                    <select class="form-control" name="country" id="country" required>
                                                        <option selected disabled value="">Choose...</option>
                                                        @foreach($countries as $country)
                                                            <option value="{{$country->id}}">{{$country->country_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">  
                                            <div class="col-6">
                                                <div>
                                                    <label for="name" class="form-label mb-0 required">Title</label>
                                                    <input type="text" class="form-control" name="title" required>
                                                </div>  
                                            </div>
                                            <div class="col-6">
                                                <div>
                                                    <label class="form-label mb-0 required">Area/location</label>
                                                    <select name="area" class="form-control custom-select" id="area" required>

                                                    </select>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label mb-0 mt-4 required">Message</label>
                                                <textarea class="form-control" rows="6" name="message" placeholder="Message" required></textarea>
                                            </div>
                                        </div>
        

                                        <div class="mt-5 text-center">
                                            <input type="submit" value="Submit" class="btn rounded-pill text-light px-4 py-2" style="background-color: #94ca60;">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> 

                </div>

            </div>
        </div>
    </div> 

@endif
@endsection


@push('after-scripts')

<script>
    $(document).ready(function() {
        $('#country').on('change', function() {
            var CountryID = $(this).val();
            // console.log(CountryID);

                $.ajax({
                    
                    url: "{{url('/')}}/api/findLocationWithCountryID/" + CountryID,

                    method: "GET",
                    dataType: "json",
                    success:function(data) {
                        console.log(data);
                    if(data){
                        $('#area').empty();
                        $('#area').focus;
                        $('#area').append('<option value="" selected disabled>-- Select Here --</option>'); 
                        $.each(data, function(key, value){
                            // console.log(value);
                        $('select[name="area"]').append('<option value="'+ value.location_id +'">' + value.location_district+ '</option>');
                        
                    });

                    }else{
                        $('#area').empty();
                    }
                }
                });
            
        });
    });
</script>

@endpush

