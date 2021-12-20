@extends('frontend.layouts.app')

@section('title', 'Agent Form')

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
                        <h1 style="margin-top:60px;" class="display-6">Request Sent Succesfully!!</h1><br>
                            <hr><br>    
                            <p class="lead">
                                <a class="btn btn-success btn-md" href="{{route('frontend.user.account_dashboard')}}" role="button">Go Back To Account Dashboard</a>
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

                    <div class="row justify-content-center mb-2">
                        <div class="col-11 p-0">
                            <div class="form-group">
                                <div class="row">
                                    @if(session()->has('error'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('error') }}
                                        </div>
                                    @endif                                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-between mb-4">
                        <div class="col-12 p-0">
                            <div class="row align-items-center">
                                <div class="col-6 ps-4">
                                    <h4 class="fs-4 fw-bolder user-settings-head">Agent Request Form</h4>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="px-2" id="nav-agent" role="tabpanel" aria-labelledby="nav-agent-tab">
                                <div class="row align-items-center justify-content-between mb-4 border py-3">
                                
                                    <h4 class="mb-3">About Agent</h4>
                                
                                    <form action="{{route('frontend.user.agent.store')}}" method="post" enctype="multipart/form-data" >
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-6">
                                            <div>
                                                <label for="name" class="form-label mb-2">Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="name" required>
                                            </div> 
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label mb-2">Country <span class="text-danger">*</span></label>
                                                <select class="form-control custom-select" id="country" name="country" required>
                                                    <option value="" selected disabled>Select...</option>
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
                                                <label class="form-label mb-2 mt-3 required">Email <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" name="email" required>
                                            </div>  
                                        </div>
                                        <div class="col-6">
                                            <div>
                                                <label class="form-group mb-2 mt-3">Area/location <span class="text-danger">*</span></label>
                                                <select name="area" class="form-control custom-select" id="area" required>

                                                </select>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div>
                                                <label class="form-label mb-2 mt-3 required">Agent Type <span class="text-danger">*</span></label>
                                                <select class="form-control agent_type" name="agent_type" required>
                                                    <option value="" selected disabled>Select...</option>
                                                    <option value="Individual">Individual</option>
                                                    <option value="Company">Company</option>
                                                </select>
                                            </div>  
                                        </div>                              
                                        <div class="col-6">
                                            <div>
                                                <label for="city" class="form-label mb-2 mt-3 required">City <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="city" required>
                                            </div>                                 
                                        </div>                         
                                    </div> 
                                    <div class="row">
                                        <div class="col-6 company_name d-none">
                                            <div>
                                                <label class="form-label mb-2 mt-3 required">Company Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="company_name">
                                            </div> 
                                        </div>  
                                        <div class="col-6 company_reg_no d-none">
                                            <div>
                                                <label class="form-label mb-2 mt-3 required">Company Registration Number <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="company_reg_no">
                                            </div>  
                                        </div>
                                    </div>
                                        

                                        <h4 class="mt-5">More About Agent</h4>
                                        <h6 class="mb-3" style="color: #5e6871">Tell us more about the agent</h6>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="mb-2 mt-3">Agent Photo
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group" data-toggle="aizuploader" data-type="image">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                                        </div>
                                                        <div class="form-control file-amount">Choose File</div>
                                                        <input type="hidden" name="photo" class="selected-files" >
                                                    </div>
                                                    <div class="file-preview box sm">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="mb-2 mt-3">Logo
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group" data-toggle="aizuploader" data-type="image">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                                        </div>
                                                        <div class="form-control file-amount">Choose File</div>
                                                        <input type="hidden" name="logo" class="selected-files" >
                                                    </div>
                                                    <div class="file-preview box sm">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div>
                                                    <label class="form-label mb-2 mt-3 required">Request <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="request_field" required>
                                                </div> 
                                            </div>
                                            <div class="col-6">
                                                <div>
                                                    <label class="form-label mb-2 mt-3">Tax Number <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="tax" required>
                                                </div>
                                            </div>
                                        </div>

                                        <h4 class="mt-5 mb-1">Validate Informations</h4>
                                        <!-- <h6 style="color: #5e6871">Tell us more about the agent</h6> -->
                                        
                                        <div class="row">
                                            <div class="col-6">
                                                <div>
                                                    <label class="form-label mb-2 mt-3 required">NIC/ Passport/ License <span class="text-danger">*</span></label>
                                                    <select class="form-control" name="validate" id="validate" required>
                                                        <option value="" selected disabled>Select...</option>
                                                        <option value="NIC">NIC</option>
                                                        <option value="Passport">Passport</option>
                                                        <option value="License">License</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-6">  
                                                    
                                                <div id="divFrmNIC" class="form-group form-validate-div" style="display:none">
                                                    <label class="form-label mb-2 mt-3 required">NIC <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="nic" name="nic" placeholder="NIC Number" > 
                                                </div>
                                                <div id="divFrmPassport" class="form-group form-validate-div" style="display:none">
                                                    <label class="form-label mb-2 mt-3 required">Passport <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="passport" name="passport" placeholder="Passport Number" > 
                                                </div>
                                                <div id="divFrmLicense" class="form-group form-validate-div" style="display:none">
                                                    <label class="form-label mb-2 mt-3 required">License <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="license" name="license" placeholder="License Number" > 
                                                </div>
                                            </div>
                                                    
                                            <div class="col-6">

                                                <div id="imgNIC" class="form-group form-image-div" style="display:none">
                                                    <div class="form-group">
                                                        <label class="mb-2 mt-3">NIC Photo
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                                            </div>
                                                            <div class="form-control file-amount">Choose File</div>
                                                            <input type="hidden" id="nic_photo" name="nic_photo" class="selected-files" >
                                                        </div>
                                                        <div class="file-preview box sm">
                                                        </div>
                                                    </div>                                                                                
                                                </div>
                                                <div id="imgPassport" class="form-group form-image-div" style="display:none">                                           
                                                    <div class="form-group">
                                                        <label class="mb-2 mt-3">Passport Photo
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                                            </div>
                                                            <div class="form-control file-amount">Choose File</div>
                                                            <input type="hidden" id="passport_photo" name="passport_photo" class="selected-files" >
                                                        </div>
                                                        <div class="file-preview box sm">
                                                        </div>
                                                    </div> 
                                                </div>
                                                <div id="imgLicense" class="form-group form-image-div" style="display:none">
                                                    <div class="form-group">
                                                        <label class="mb-2 mt-3">License Photo
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                                            </div>
                                                            <div class="form-control file-amount">Choose File</div>
                                                            <input type="hidden" id="license_photo" name="license_photo" class="selected-files" >
                                                        </div>
                                                        <div class="file-preview box sm">
                                                        </div>
                                                    </div>                                                                                
                                                </div>
                                            </div>

                                        </div>

                                        
                                        <h4 class="mt-5 mb-1">Contact Information</h4>
                                        <h6 class="mb-3" style="color: #5e6871">Keep your contact details up to date</h6>

                                        <div class="row">
                                            <div class="col-6">
                                                <div>
                                                    <label class="form-label mb-2 required">Address <span class="text-danger">*</span></label>
                                                    <input type="address" class="form-control" name="address" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div>
                                                    <label class="form-label mb-2 required">Telephone <span class="text-danger">*</span></label>
                                                    <input type="telephone" class="form-control" name="telephone" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label mb-2 mt-4 required">Description Message (Minimum length of the characters in Description should be 500)<span class="text-danger">*</span></label>
                                                <textarea class="form-control" rows="4" name="description_msg" placeholder="Description Message" required></textarea>
                                            </div>
                                        </div>

                                        <div class="mt-5 text-center">
                                            @if(App\Models\AgentRequest::where('user_id',auth()->user()->id)->first() == null)
                                                <input type="submit" value="Submit" class="btn rounded-pill text-light px-4 py-2" style="background-color: #94ca60;">
                                            @else
                                                <input type="submit" value="Already added an Agent Request" class="btn rounded-pill text-light px-4 py-2 disabled" style="background-color: #85B556;">
                                            @endif

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
        $('.agent_type').change(function() {
            if ($(this).val() == 'Individual') {
                $('.company_name').addClass('d-none');
                $('.company_reg_no').addClass('d-none');
                $('.company_name').find('input').removeAttr('required');
                $('.company_reg_no').find('input').removeAttr('required');
            }
            else {
                $('.company_name').removeClass('d-none');
                $('.company_reg_no').removeClass('d-none');
                $('.company_name').find('input').prop('required', true);
                $('.company_reg_no').find('input').prop('required', true);
            }
        });


        $(function() {
            $( "#validate" ).change(function() {  
                validate();
            });
            function validate() {
                $('.form-validate-div').hide();
                var divKey = $( "#validate option:selected" ).val();                
                $('#divFrm'+divKey).show();

                $('.form-image-div').hide();
                var divKey = $( "#validate option:selected" ).val();                
                $('#img'+divKey).show();
            }       
            validate();
        });

        $('#validate').change(function() {

        if($(this).val() == 'NIC') {
            $('#nic').prop('required', true);
            $('#nic_photo').prop('required', true);

            $('#passport').prop('required', false);
            $('#passport_photo').prop('required', false);

            $('#license').prop('required', false);
            $('#license_photo').prop('required', false);
        }

        if($(this).val() == 'Passport') {
            $('#passport').prop('required', true);
            $('#passport_photo').prop('required', true);

            $('#nic').prop('required', false);
            $('#nic_photo').prop('required', false);

            $('#license').prop('required', false);
            $('#license_photo').prop('required', false);
        }

        if($(this).val() == 'License') {
            $('#license').prop('required', true);
            $('#license_photo').prop('required', true);

            $('#nic').prop('required', false);
            $('#nic_photo').prop('required', false);

            $('#passport').prop('required', false);
            $('#passport_photo').prop('required', false);
        }
        })
        
        
    </script>

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