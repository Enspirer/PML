@extends('frontend.layouts.app')

@section('title', 'Account Information' )

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ url('css/profile-settings.css') }}">
@endpush

<div style="background: #e8eeef;">
    <div class="container user-settings" style="margin-top:6rem;">
        <div class="row justify-content-between">
            <div class="col-4 col-xs-12 left" style="background-color: #E8EEEF;position:sticky;overflow:hidden;top:15%;height:100%;">
                <div class="row">
                    <div class="col-12">
                        @include('frontend.includes.profile-settings-links')
                    </div>
                </div>
            </div>

            <div id="spanel" class="col-8 ps-4 right pb-5 col-xs-12" style="padding-top: 3rem; background-color: #F5F9FA">

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

                <div class="row">
                    <div class="col-12">
                        <h3>Hi, <span class="h3 fw-bold">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</span></h3>
                    </div>
                </div>



                <ul class="nav nav-pills mt-4 mb-3 justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-accountInformation-tab" data-bs-toggle="pill" data-bs-target="#pills-accountInformation" type="button" role="tab" aria-controls="pills-accountInformation" aria-selected="true">Account Information</button>
                    </li>
                    @if($agent_edit)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-agent-tab" data-bs-toggle="pill" data-bs-target="#pills-agent" type="button" role="tab" aria-controls="pills-agent" aria-selected="true">Agent Information</button>
                    </li>
                    @endif
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-accountInformation" role="tabpanel" aria-labelledby="pills-accountInformation-tab">

                        <div class="row justify-content-between mb-4">
                            <div class="col-8">
                                <h5 class="fw-bold user-settings-head mb-1">ACCOUNT INFORMATION</h5>
                                <h6 class="user-settings-sub" style="color: #5e6871">Here you can customize your basic account set-up information.</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <form action="{{route('frontend.user.account_details')}}" method="post" enctype="multipart/form-data" >
                                    {{csrf_field()}}
                                    <div class="row px-3 mb-4">
                                        <div class="col-12 bg-white py-4 sections">
                                            <h5 class="mb-3">About You</h5>

                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <div>
                                                        <label for="first_name" class="form-label mb-0">First Name</label>
                                                        <input type="text" class="form-control" value="{{$user_edit->first_name}}" name="first_name" id="first_name">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div>
                                                        <label for="lastName" class="form-label mb-0">Last Name</label>
                                                        <input type="text" value="{{$user_edit->last_name}}" class="form-control" id="lastName" aria-describedby="lastName" name="last_name" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div>
                                                        <label for="displayName" class="form-label mb-0">Display Name</label>
                                                        <input type="text" class="form-control" id="displayName" name="display_name" aria-describedby="displayName" value="{{$user_edit->display_name}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div>
                                                        <label for="email" class="form-label mb-0">Email</label>
                                                        <input value="{{$user_edit->email}}" type="email" class="form-control" id="email" aria-describedby="email" name="email" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row px-3 mb-4">
                                        <div class="col-12 bg-white py-4 sections">
                                            <h5>More About You</h5>
                                            <h6 class="mb-3" style="color: #19224C">Tell us more about you and your real estate needs.</h6>

                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <label for="user_type" class="form-label mb-0">I am a</label>
                                                    <select class="form-select" aria-label="user_type" id="user_type" name="user_type" value="" required>
                                                        <option value="">No Preference</option>
                                                        <option value="first-time-buyer">First time buyer</option>
                                                        <option value="repeat-buyer">Repeat buyer</option>
                                                        <option value="seller">Seller</option>
                                                        <option value="residential-investor">Residential investor</option>
                                                        <option value="commercial-investor">Commercial investor</option>
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label for="dob" class="form-label mb-0">Year of birth</label>
                                                    <input type="date" class="form-control" id="dob" aria-describedby="dob" name="dob" value="{{$user_edit->birth_date}}" required>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="gender" class="form-label mb-0">Gender</label>
                                                    <select class="form-select" aria-label="gender" id="gender" name="gender" value="" required>
                                                        <option value="">Select</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label for="displayName" class="form-label mb-0">Marital Status</label>
                                                    <select class="form-select" aria-label="Default select example" id="marital" name="marital" value="" required>
                                                        <option value="">Select</option>
                                                        <option value="single">Single</option>
                                                        <option value="common-law">Common Law</option>
                                                        <option value="married">Married</option>
                                                        <option value="separated">separated</option>
                                                        <option value="divorced">Divorced</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row px-3 mb-4">
                                        <div class="col-12 bg-white py-4 sections">
                                            <h5>Contact Information</h5>
                                            <h6 class="mb-3" style="color: #19224C">Keep your contact details up to date</h6>

                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <div>
                                                        <label for="city" class="form-label mb-0">City</label>
                                                        <input type="text" class="form-control" id="city" aria-describedby="city" name="city" value="{{$user_edit->city}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div>
                                                        <label for="province" class="form-label mb-0">Province</label>
                                                        <input type="province" class="form-control" id="province" aria-describedby="province" name="province" value="{{$user_edit->province}}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="user_countries" class="form-label mb-0">Country</label>
                                                    <select class="form-select" aria-label="user_countries" name="user_countries" id="user_countries" required>
                                                        <option value="">Select</option>
                                                        <option value="Angola">Angola</option>
                                                        <option value="Anguilla">Anguilla</option>
                                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                        <option value="Aruba">Aruba</option>
                                                        <option value="Bahamas">Bahamas</option>
                                                        <option value="Barbados">Barbados</option>
                                                        <option value="Belize">Belize</option>
                                                        <option value="Benin">Benin</option>
                                                        <option value="Bolivia">Bolivia</option>
                                                        <option value="Brazil">Brazil</option>
                                                        <option value="British Virgin Islands">British Virgin Islands</option>
                                                        <option value="Brunei">Brunei</option>
                                                        <option value="Burkina Faso">Burkina Faso</option>
                                                        <option value="Burma">Burma</option>
                                                        <option value="Burundi">Burundi</option>
                                                        <option value="Cambodia">Cambodia</option>
                                                        <option value="Cameroon">Cameroon</option>
                                                        <option value="Cayman Islands">Cayman Islands</option>
                                                        <option value="Central African Republic">Central African Republic</option>
                                                        <option value="Chad">Chad</option>
                                                        <option value="Colombia">Colombia</option>
                                                        <option value="Comoros">Comoros</option>
                                                        <option value="Congo">Congo</option>
                                                        <option value="Costa Rica">Costa Rica</option>
                                                        <option value="Cuba">Cuba</option>
                                                        <option value="Democratic Republic of Congo">Democratic Republic of Congo</option>
                                                        <option value="Djibouti">Djibouti</option>
                                                        <option value="Dominica">Dominica</option>
                                                        <option value="Dominican Republic">Dominican Republic</option>
                                                        <option value="East Timor">East Timor</option>
                                                        <option value="Ecuador">Ecuador</option>
                                                        <option value="El Salvador">El Salvador</option>
                                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                        <option value="Eritrea">Eritrea</option>
                                                        <option value="Ethiopia">Ethiopia</option>
                                                        <option value="French Guiana">French Guiana</option>
                                                        <option value="Gabon">Gabon</option>
                                                        <option value="Galapagos Islands">Galapagos Islands</option>
                                                        <option value="Gambia">Gambia</option>
                                                        <option value="Grenada">Grenada</option>
                                                        <option value="Guadeloupe">Guadeloupe</option>
                                                        <option value="Guatemala">Guatemala</option>
                                                        <option value="Guinea">Guinea</option>
                                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                        <option value="Guyana">Guyana</option>
                                                        <option value="Haiti">Haiti</option>
                                                        <option value="Honduras">Honduras</option>
                                                        <option value="India">India</option>
                                                        <option value="Indonesia">Indonesia</option>
                                                        <option value="Ivory Coast">Ivory Coast</option>
                                                        <option value="Jamaica">Jamaica</option>
                                                        <option value="Kenya">Kenya</option>
                                                        <option value="Laos">Laos</option>
                                                        <option value="Liberia">Liberia</option>
                                                        <option value="Madagascar">Madagascar</option>
                                                        <option value="Malawi">Malawi</option>
                                                        <option value="Malaysia">Malaysia</option>
                                                        <option value="Mali">Mali</option>
                                                        <option value="Martinique">Martinique</option>
                                                        <option value="Mauritania">Mauritania</option>
                                                        <option value="Mauritius">Mauritius</option>
                                                        <option value="Mayotte">Mayotte</option>
                                                        <option value="Mexico">Mexico</option>
                                                        <option value="Montserrat">Montserrat</option>
                                                        <option value="Mozambique">Mozambique</option>
                                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                        <option value="Nicaragua">Nicaragua</option>
                                                        <option value="Niger">Niger</option>
                                                        <option value="Nigeria">Nigeria</option>
                                                        <option value="Panama">Panama</option>
                                                        <option value="Paraguay">Paraguay</option>
                                                        <option value="Peru">Peru</option>
                                                        <option value="Philippines">Philippines</option>
                                                        <option value="Puerto Rico">Puerto Rico</option>
                                                        <option value="Reunion">Reunion</option>
                                                        <option value="Rwanda">Rwanda</option>
                                                        <option value="Saint Barthelemy">Saint Barthelemy</option>
                                                        <option value="Saint Helena">Saint Helena</option>
                                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                        <option value="Saint Lucia">Saint Lucia</option>
                                                        <option value="Saint Martin">Saint Martin</option>
                                                        <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                        <option value="Senegal">Senegal</option>
                                                        <option value="Seychelles">Seychelles</option>
                                                        <option value="Sierra Leone">Sierra Leone</option>
                                                        <option value="Singapore">Singapore</option>
                                                        <option value="Somalia">Somalia</option>
                                                        <option value="Sri Lanka">Sri Lanka</option>
                                                        <option value="Sudan">Sudan</option>
                                                        <option value="Suriname">Suriname</option>
                                                        <option value="Tanzania">Tanzania</option>
                                                        <option value="Thailand">Thailand</option>
                                                        <option value="Togo">Togo</option>
                                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                        <option value="Turks and Cacaos Islands">Turks and Cacaos Islands</option>
                                                        <option value="Uganda">Uganda</option>
                                                        <option value="United States Virgin Islands">United States Virgin Islands</option>
                                                        <option value="Venezuela">Venezuela</option>
                                                        <option value="Vietnam">Vietnam</option>
                                                        <option value="Zambia">Zambia</option>
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <div>
                                                        <label for="postal-code" class="form-label mb-0">Postal Code</label>
                                                        <input type="postal-code" class="form-control" id="postal-code" name="postal_code" aria-describedby="postal-code" value="{{$user_edit->postal_code}}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div>
                                                        <label for="home-phone" class="form-label mb-0 mt-4 required">Home Phone</label>
                                                        <input type="home-phone" class="form-control" id="home-phone" name="home_phone" aria-describedby="home-phone" value="{{$user_edit->home_phone}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div>
                                                        <label for="mobile-phone" class="form-label mb-0 mt-4 required">Mobile Phone</label>
                                                        <input type="mobile-phone" class="form-control" id="mobile-phone" name="mobile_phone" aria-describedby="mobile-phone" value="{{$user_edit->mobile_phone}}" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-5 text-end">
                                        <!-- <button type="button" class="btn px-4 py-2 me-2 fw-bold rounded-0" style="color: #19224C; border: 1px solid #707070">Deactivate Account</button> -->
                                        <input type="hidden" class="form-control" value="{{$user_edit->id}}" name="shadow_id">
                                        <button type="submit" class="btn text-light px-4 py-2 ms-2 rounded-0 fw-bold" style="background-color: #35495E;">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                



                <!---------------------------------------- agent information  ----------------------------------------- -->



                    @if($agent_edit)
                    <div class="tab-pane fade" id="pills-agent" role="tabpanel" aria-labelledby="pills-agent-tab">

                        <form action="{{route('frontend.user.agent.update_agent')}}" method="post" enctype="multipart/form-data" >
                            {{csrf_field()}}

                            <div class="row">
                                <div class="col-6">
                                    <div>
                                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" value="{{$agent_edit->name}}" required>
                                    </div> 
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label">Country <span class="text-danger">*</span></label>
                                        <select class="form-control custom-select" id="country" name="country" required>
                                            <option value="" selected disabled>Select...</option>
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}" {{ $country->id == $agent_edit->country ? "selected" : "" }}>{{$country->country_name}}</option>  
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div>
                                        <label class="form-label mb-2 mt-2 required">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email" value="{{$agent_edit->email}}" required>
                                    </div>  
                                </div>
                                <div class="col-6">
                                    <input type="hidden" class="form-control" value="{{ $agent_edit->area }}" id="location_received" >
                                    
                                    <div>
                                        <label class="form-group mb-2 mt-2">Area/location <span class="text-danger">*</span></label>
                                        <select name="area" class="form-control custom-select" id="area" required>
            
                                        </select>
                                    </div>    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div>
                                        <label class="form-label mb-2 mt-4 required">Agent Type <span class="text-danger">*</span></label>
                                        <select class="form-control agent_type" name="agent_type" required>
                                            <option value="" selected disabled>Select...</option>
                                            <option value="Individual" {{$agent_edit->agent_type == 'Individual' ? "selected" : ""}}>Individual</option>
                                            <option value="Company" {{$agent_edit->agent_type == 'Company' ? "selected" : ""}}>Company</option>
                                        </select>
                                    </div>  
                                </div> 
                                <div class="col-6">
                                    <div>
                                        <label for="city" class="form-label mb-2 mt-4 required">City <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="city" value="{{$agent_edit->city}}" required>
                                    </div>                                 
                                </div>                          
                            </div> 
                            <div class="row">
                                <div class="col-6 company_name d-none">
                                    <div>
                                        <label class="form-label mb-2 mt-4 required">Company Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" value="{{$agent_edit->company_name}}" name="company_name">
                                    </div> 
                                </div>  
                                <div class="col-6 company_reg_no d-none">
                                    <div>
                                        <label class="form-label mb-2 mt-4 required">Company Registration Number <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" value="{{$agent_edit->company_registration_number}}" name="company_reg_no">
                                    </div>  
                                </div>
                            </div>
                                 
                            

                            <h4 class="mt-5 mb-1">More About Agent</h4>
                            <h6 class="mb-3" style="color: #5e6871">Tell us more about the agent</h6>


                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="mb-2 mt-4">Agent Photo
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                                </div>
                                                <div class="form-control file-amount">Choose File</div>
                                                <input type="hidden" name="photo" value="{{$agent_edit->photo}}" class="selected-files" >
                                            </div>
                                            <div class="file-preview box sm">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="mb-2 mt-4">Logo
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                                </div>
                                                <div class="form-control file-amount">Choose File</div>
                                                <input type="hidden" name="logo" value="{{$agent_edit->logo}}" class="selected-files" >
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
                                            <input type="text" class="form-control" value="{{$agent_edit->request}}" name="request_field" required>
                                        </div> 
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-2 mt-3">Tax Number <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{$agent_edit->tax_number}}" name="tax" required>
                                        </div>
                                    </div>
                                </div>

                            <h4 class="mt-5 mb-1">Validate Informations</h4>

                                
                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-2 mt-4 required">NIC/ Passport/ License <span class="text-danger">*</span></label>
                                            <select class="form-control" name="validate" id="validate" required>
                                                <option value="" selected disabled>Select...</option>
                                                <option value="NIC" {{$agent_edit->validation_type == 'NIC' ? "selected" : ""}}>NIC</option>
                                                <option value="Passport" {{$agent_edit->validation_type == 'Passport' ? "selected" : ""}}>Passport</option>
                                                <option value="License" {{$agent_edit->validation_type == 'License' ? "selected" : ""}}>License</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-6">  
                                            
                                        <div id="divFrmNIC" class="form-group form-validate-div" style="display:none">
                                            <label class="form-label mb-2 mt-4 required">NIC <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="nic" name="nic" value="{{$agent_edit->nic}}" placeholder="NIC Number" > 
                                        </div>
                                        <div id="divFrmPassport" class="form-group form-validate-div" style="display:none">
                                            <label class="form-label mb-2 mt-4 required">Passport <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="passport" name="passport" value="{{$agent_edit->passport}}" placeholder="Passport Number" > 
                                        </div>
                                        <div id="divFrmLicense" class="form-group form-validate-div" style="display:none">
                                            <label class="form-label mb-2 mt-4 required">License <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="license" name="license" value="{{$agent_edit->license}}" placeholder="License Number" > 
                                        </div>
                                    </div>
                                            
                                    <div class="col-6">

                                        <div id="imgNIC" class="form-group form-image-div" style="display:none">
                                            <div class="form-group">
                                                <label class="mb-2 mt-4">NIC Photo
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                                    </div>
                                                    <div class="form-control file-amount">Choose File</div>
                                                    <input type="hidden" id="nic_photo" name="nic_photo" value="{{$agent_edit->nic_photo}}" class="selected-files" >
                                                </div>
                                                <div class="file-preview box sm">
                                                </div>
                                            </div>                                                                                
                                        </div>
                                        <div id="imgPassport" class="form-group form-image-div" style="display:none">                                           
                                            <div class="form-group">
                                                <label class="mb-2 mt-4">Passport Photo
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                                    </div>
                                                    <div class="form-control file-amount">Choose File</div>
                                                    <input type="hidden" id="passport_photo" name="passport_photo" value="{{$agent_edit->passport_photo}}" class="selected-files" >
                                                </div>
                                                <div class="file-preview box sm">
                                                </div>
                                            </div> 
                                        </div>
                                        <div id="imgLicense" class="form-group form-image-div" style="display:none">
                                            <div class="form-group">
                                                <label class="mb-2 mt-4">License Photo
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                                    </div>
                                                    <div class="form-control file-amount">Choose File</div>
                                                    <input type="hidden" id="license_photo" name="license_photo" value="{{$agent_edit->license_photo}}" class="selected-files" >
                                                </div>
                                                <div class="file-preview box sm">
                                                </div>
                                            </div>                                                                                
                                        </div>
                                    </div>

                                </div>

                                
                                <h4 class="mt-2 mb-1">Contact Information</h4>
                                <h6 class="mb-4" style="color: #5e6871">Keep your contact details up to date</h6>

                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-2 required">Address <span class="text-danger">*</span></label>
                                            <input type="address" class="form-control" value="{{$agent_edit->address}}" name="address" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-2 required">Telephone <span class="text-danger">*</span></label>
                                            <input type="telephone" class="form-control" value="{{$agent_edit->telephone}}" name="telephone" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label mb-2 mt-4 required">Description Message (Minimum length of the characters in Description should be 500)<span class="text-danger">*</span></label>
                                        <textarea class="form-control" rows="4" name="description_msg" placeholder="Description Message" required>{{$agent_edit->description_message}}</textarea>
                                    </div>
                                </div>


                                <div class="col-6 mt-4">
                                    <div class="form-group">
                                        <label class="mb-2 mt-4">Cover Photo
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                            </div>
                                            <div class="form-control file-amount">Choose File</div>
                                            <input type="hidden" name="cover_photo" value="{{$agent_edit->cover_photo}}" class="selected-files" >
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                    </div>
                                </div>

                            <br>

                            <div class="mt-5 text-center">
                                <input type="hidden" class="form-control" value="{{$agent_edit->id}}" name="hidden_id">
                                <input type="submit" value="Update" class="btn rounded-pill text-light px-4 py-2" style="background-color: #94ca60;">
                            </div>

                        </form>    
                        
                        
                    </div>
                    @endif


                </div>

            </div>
        </div>
    </div>
</div>

    <script>
        let mainNavLinks = document.querySelectorAll(".nav");
        let mainSections = document.querySelectorAll("#spanel");
        let lastId;
        let cur = [];
        window.addEventListener("scroll", event => {
            let fromTop = window.scrollY;

            mainNavLinks.forEach(link => {
                let section = document.querySelector(link.hash);

                if (
                    section.offsetTop <= fromTop &&
                    section.offsetTop + section.offsetHeight > fromTop
                ) {
                    link.classList.add("current");
                } else {
                    link.classList.remove("current");
                }
            });
        });
    </script>

@endsection


@push('after-scripts')

<script>

let user_countries = <?php echo json_encode ($user_edit->country ) ?>

$('#user_countries option').each(function(i){
    if($(this).val() == user_countries) {
        $(this).attr('selected', 'selected');
    }
});

let gender = <?php echo json_encode ($user_edit->gender ) ?>

$('#gender option').each(function(i){
    if($(this).val() == gender) {
        $(this).attr('selected', 'selected');
    }
});

let dob = <?php echo json_encode ($user_edit->dob ) ?>

$('#dob option').each(function(i){
    if($(this).val() == dob) {
        $(this).attr('selected', 'selected');
    }
});

let marital = <?php echo json_encode ($user_edit->marital_status) ?>

$('#marital option').each(function(i){
    if($(this).val() == marital) {
        $(this).attr('selected', 'selected');
    }
});

let user_type = <?php echo json_encode ($user_edit->preference) ?>

$('#user_type option').each(function(i){
    if($(this).val() == user_type) {
        $(this).attr('selected', 'selected');
    }
});

</script>


<script>

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
    

    $(document).ready(function() {
        if ($('.agent_type').val() == 'Individual') {
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



    $(document).ready(function() {
        if($('#validate').val() == 'NIC') {
            $('#nic').prop('required', true);
            // $('#nic_photo').prop('required', true);
        }

        if($('#validate').val() == 'Passport') {
            $('#passport').prop('required', true);
            // $('#passport_photo').prop('required', true);
        }

        if($('#validate').val() == 'License') {
            $('#license').prop('required', true);
            // $('#license_photo').prop('required', true);
        }
    });

    $('#validate').change(function() {
        if($(this).val() == 'NIC') {
            $('#nic').prop('required', true);
            $('#nic_photo').prop('required', true);
        }

        if($(this).val() == 'Passport') {
            $('#passport').prop('required', true);
            $('#passport_photo').prop('required', true);
        }

        if($(this).val() == 'License') {
            $('#license').prop('required', true);
            $('#license_photo').prop('required', true);
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
                                    // console.log(data);
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

        <script>

            $(document).ready(function() {
                // $('#category').on('change', function() {

                    var CountryID = $('#country').val();
                    // console.log(CountryID);
                    var LocID = $('#location_received').val();
                    // console.log(LocID);
                    

                        $.ajax({
                            
                            url: "{{url('/')}}/api/findLocationWithCountryID/" + CountryID,
                            method: "GET",
                            dataType: "json",
                            success:function(data) {
                                // console.log(data);
                            if(data){
                                $('#area').empty();
                                $('#area').focus;
                                // $('#area').append('<option value="" selected disabled>-- Select Sub Category --</option>'); 
                                $.each(data, function(key, value){
                                    // console.log(value);
                                    if(LocID == value.location_id){                                       
                                        $('#area').append('<option value="'+ value.location_id +'">' + value.location_district+ '</option>');
                                    }
                                    
                                    // $('select[name="area"]').append('<option value="'+ value.location_id +'">' + value.location_district+ '</option>');
                                                                       
                                
                                });

                            }else{
                                $('#area').empty();
                            }
                        }
                        });
                    
                // });
            });

        </script>

@endpush



