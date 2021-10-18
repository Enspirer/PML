@extends('backend.layouts.app')

@section('title', __('Edit'))

@section('content')
    <form action="{{route('admin.country.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label>Country Name <span class="text-danger">*</span></label>
                            <input type="text" name="country" id="country" class="form-control" value="{{ $country->country_name }}" required>
                        </div>
                        <div class="form-group">
                            <label>SLUG <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ $country->slug }}" required>
                        </div>

                        <div class="form-group">
                            <label>Currency <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="currency" value="{{ $country->currency }}" required>
                        </div>
                        <div class="form-group">
                            <label>Currency Rate <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="currency_rate" value="{{ $country->currency_rate }}" required>
                        </div>
                        <div class="form-group">
                            <label>Country ID <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="country_id" value="{{ $country->country_id }}" required>
                        </div>    
                        <div class="form-group">
                            <label>Status <span class="text-danger">*</span></label>
                            <select class="form-control" name="status" required>
                                <option value="1" {{ $country->status == '1' ? "selected" : "" }}>Enable</option>   
                                <option value="0" {{ $country->status == '0' ? "selected" : "" }}>Disable</option>                                
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
                                <input type="text" class="form-control" name="address" value="{{ $country->address }}" required>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Opening Hours <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="opening_hours" value="{{ $country->opening_hours }}" required>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Phone Numbers <span class="text-danger">*</span></label>

                                    <div id="inputFormRow">
                                        @foreach(json_decode($country->phone_numbers) as $key => $count)
                                            <div class="input-group mb-3">
                                                
                                                <input type="number" name="phone_numbers[]" class="form-control m-input" value="{{ $count->number }}" autocomplete="off" required>
                                                
                                                <div class="input-group-append">                
                                                    <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    

                                    <div id="newRow"></div>
                                    <button id="addRow" type="button" class="btn btn-info">Add Row</button>

                                                            
                            </div> 

                            
                        </div>
                    </div>
                </div>
                <div class="mt-3 text-center">
                    <input type="hidden" name="hidden_id" value="{{ $country->id }}"/>
                    <a href="{{route('admin.country.index')}}" class="btn btn-info rounded-pill text-light px-4 py-2">Back</a>&nbsp;&nbsp;
                    <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
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
            // $(this).closest('#inputFormRow').remove();
            $(this).parents('.input-group').remove();
        });        
        
    </script>


    <script>
        $("#country").keyup(function(){
            var str = $(this).val();
            var trims = $.trim(str)
            var slug = trims.replace(/[^a-z0-9]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '')
            $("#slug").val(slug.toLowerCase()) 
        })
    </script>


<br><br>
@endsection
