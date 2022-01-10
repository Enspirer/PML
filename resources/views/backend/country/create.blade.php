@extends('backend.layouts.app')

@section('title', __('Create New'))

@section('content')


    <form action="{{route('admin.country.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">                        
                        <div class="form-group">
                            <label>Country Name <span class="text-danger">*</span></label>
                            <input type="text" id="country" class="form-control" name="country" required>
                        </div>
                        <div class="form-group">
                            <label>Longitude <span class="text-danger">*</span></label>
                            <input type="text" id="longitude" class="form-control" name="longitude" required>
                        </div>
                        <div class="form-group">
                            <label>Latitude <span class="text-danger">*</span></label>
                            <input type="text" id="latitude" class="form-control" name="latitude" required>
                        </div>
                        <div class="form-group">
                            <label>SLUG <span class="text-danger">*</span></label>
                            <input type="text" id="slug" class="form-control" name="slug" required>
                        </div>
                        <div class="form-group">
                            <label>Currency <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="currency" required>
                        </div>
                        <div class="form-group">
                            <label>Currency Rate <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="currency_rate" required>
                        </div>
                        <div class="form-group">
                            <label>Country ID <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="country_id" required>
                        </div>                
                        <!-- <div class="form-group">
                            <label for="country_manager" class="form-label">Country Manager</label>
                            <br>
                              
                            <datalist class="form-group w-100" name="country_manager" id="country_manager" >
                                @foreach($users as $user)
                                    <option value="{{ $user->email }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                                @endforeach
                            </datalist>   
                            
                            <input class="form-control w-100" autoComplete="on" name="country_manager" list="country_manager" required/> 

                        </div> -->
                        <div class="form-group">
                            <label>Status <span class="text-danger">*</span></label>
                            <select class="form-control" name="status" required>
                                <option value="1">Enable</option>   
                                <option value="0">Disable</option>                                
                            </select>
                        </div>
                        
                    </div>
                </div>
            </div><br>  
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">
                            <div class="form-group">
                                <label>Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="address" required>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Opening Hours <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="opening_hours" required>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Phone Numbers <span class="text-danger">*</span></label>

                                    <div id="inputFormRow">
                                        <div class="input-group mb-3">
                                            
                                            <input type="number" name="phone_numbers[]" class="form-control m-input" autocomplete="off" required>
                                            
                                            <div class="input-group-append">                
                                                <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="newRow"></div>
                                    <button id="addRow" type="button" class="btn btn-info">Add Row</button>
                                                            
                            </div> 
                            
                        </div>
                    </div>
                </div>
                <div class="mt-3 text-center">
                    <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Create New</button>
                </div>
            </div>

            
            
        </div>

    </form>

  
    <script type="text/javascript">
        
        $("#addRow").click(function () {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-3">';
            html += '<input type="number" name="phone_numbers[]" class="form-control m-input" autocomplete="off" required>';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
            html += '</div>';
            html += '</div>';

            $('#newRow').append(html);
        });

    
        $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputFormRow').remove();
        });
    </script>


<script>

    $("#country").keyup(function(){
        var str = $(this).val();
        var trims = $.trim(str)
        var slug = trims.replace(/[^a-z0-9]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '')
        $("#slug").val(slug.toLowerCase()) 
    });    

</script>


<br><br>
@endsection
