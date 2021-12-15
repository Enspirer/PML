@extends('backend.layouts.app')

@section('title', __('Edit'))

@section('content')
    <form action="{{route('admin.location.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label>Country <span class="text-danger">*</span></label>
                            <select class="form-control custom-select" name="country" required>
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}" {{$location->country == $country->id ? "selected" : ""}}>{{$country->country_name}}</option>  
                                @endforeach                        
                            </select>
                        </div>
                        <div class="form-group">
                            <label>District <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="{{ $location->district }}" name="district" required>
                        </div>
                        <div class="form-group">
                            <label>Area Manager <span class="text-danger">*</span></label>

                            <datalist class="form-group w-100" name="area_manager" id="area_manager" >
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }} - {{ $user->email }}</option>
                                @endforeach
                            </datalist>   
                            
                            <input class="form-control w-100" autoComplete="on" value="{{ $location->area_manager }}" name="area_manager" list="area_manager" required/>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" rows="3">{{ $location->description }}</textarea> 
                        </div>
                        
                        <div class="form-group">
                            <label>Status <span class="text-danger">*</span></label>
                            <select class="form-control custom-select" name="status" required>
                                <option value="Enabled" {{ $location->status == 'Enabled' ? "selected" : "" }}>Enable</option>   
                                <option value="Disabled" {{ $location->status == 'Disabled' ? "selected" : "" }}>Disable</option>                                
                            </select>
                        </div>
                        
                        
                    </div>
                </div>
            </div><br>

            
            <div class="mt-3 text-center">
                <input type="hidden" name="hidden_id" value="{{ $location->id }}"/>
                <a href="{{route('admin.location.index')}}" class="btn btn-info rounded-pill text-light px-4 py-2">Back</a>&nbsp;&nbsp;
                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
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
