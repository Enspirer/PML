@extends('backend.layouts.app')

@section('title', __('Create New'))

@section('content')

<form action="{{route('admin.agent.store')}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
    <div class="row">
        <div class="col-7">  
                <div class="card">
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <label for="name" class="form-label mb-2">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" required>
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <label for="city" class="form-label mb-2 mt-4 required">City <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="city" required>
                                </div>                                 
                            </div>
                            <div class="col-6">
                                <div>
                                    <label class="form-label mb-2 mt-4 required">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <label class="form-label mb-2 mt-4 required">Agent Type <span class="text-danger">*</span></label>
                                    <select class="form-control agent_type" name="agent_type" required>
                                        <option value="" selected disabled>Select...</option>
                                        <option value="Individual">Individual</option>
                                        <option value="Company">Company</option>
                                    </select>
                                </div>  
                            </div>                           
                        </div> 
                        <div class="row">
                            <div class="col-6 company_name d-none">
                                <div>
                                    <label class="form-label mb-2 mt-4 required">Company Name</label>
                                    <input type="text" class="form-control" name="company_name">
                                </div> 
                            </div>  
                            <div class="col-6 company_reg_no d-none">
                                <div>
                                    <label class="form-label mb-2 mt-4 required">Company Registration Number</label>
                                    <input type="text" class="form-control" name="company_reg_no">
                                </div>  
                            </div>
                        </div>

                        <h4 class="mt-5 mb-1">More About Agent</h4>

                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <label class="form-label mb-2 mt-4 required">Request <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="request_field" required>
                                </div> 
                            </div>
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
                                        <input type="hidden" name="photo" class="selected-files" >
                                    </div>
                                    <div class="file-preview box sm">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <label class="form-label mb-2 mt-4">Tax Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="tax">
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
                                    <label class="form-label mb-2 mt-4 required">NIC</label>
                                    <input type="text" class="form-control" id="nic" name="nic" placeholder="NIC Number" > 
                                </div>
                                <div id="divFrmPassport" class="form-group form-validate-div" style="display:none">
                                    <label class="form-label mb-2 mt-4 required">Passport</label>
                                    <input type="text" class="form-control" id="passport" name="passport" placeholder="Passport Number" > 
                                 </div>
                                <div id="divFrmLicense" class="form-group form-validate-div" style="display:none">
                                    <label class="form-label mb-2 mt-4 required">License</label>
                                    <input type="text" class="form-control" id="license" name="license" placeholder="License Number" > 
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
                                            <input type="hidden" id="nic_photo" name="nic_photo" class="selected-files" >
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
                                            <input type="hidden" id="passport_photo" name="passport_photo" class="selected-files" >
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
                                            <input type="hidden" id="license_photo" name="license_photo" class="selected-files" >
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                    </div>                                                                                
                                </div>
                            </div>

                        </div>
                                
                        <h4 class="mt-5 mb-3">Contact Information</h4>

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
                                 <label class="form-label mb-2 mt-4 required">Description Message <span class="text-danger">*</span></label>
                                 <textarea class="form-control" rows="4" name="description_msg" placeholder="Description Message" required></textarea>
                             </div>
                         </div>

                        
                    </div>
                </div>
                
                <br>
            
        </div>
        <div class="col-md-5 p-1">                
            <div class="card">
                <div class="card-body">
                    <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">
                        <div class="form-group">
                            <label>Admin Approval</label>
                            <select class="form-control" name="admin_approval" required>
                                <option value="Approved">Approve</option>   
                                <option value="Disapproved">Disapprove</option> 
                                <option value="Pending">Pending</option>                               
                            </select>
                        </div>

                        <div class="mt-5 text-center">
                            <a href="{{route('admin.agent.index')}}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                            <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

    



<br><br>

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


@endsection
