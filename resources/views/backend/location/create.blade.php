@extends('backend.layouts.app')

@section('title', __('Create New'))

@section('content')


    <form action="{{route('admin.location.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">  
                        
                        <div class="form-group">
                            <label>Country <span class="text-danger">*</span></label>
                            <select class="form-control custom-select" name="country" required>
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->country_name}}</option>  
                                @endforeach                        
                            </select>
                        </div>
                        <div class="form-group">
                            <label>District <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="district" required>
                        </div>
                        <div class="form-group">
                            <label>Area Manager <span class="text-danger">*</span></label>

                            <datalist class="form-group w-100" name="area_manager" id="area_manager" >
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }} - {{ $user->email }}</option>
                                @endforeach
                            </datalist>   
                            
                            <input class="form-control w-100" autoComplete="on" name="area_manager" list="area_manager" required/>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" rows="3"></textarea> 
                        </div>   
                        <div class="form-group">
                            <label>Status <span class="text-danger">*</span></label>
                            <select class="form-control custom-select" name="status" required>
                                <option value="Enabled">Enable</option>   
                                <option value="Disabled">Disable</option>                                
                            </select>
                        </div>
                        
                    </div>
                </div>
            </div><br>  

            <div class="mt-3 text-center">
                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Create New</button>
            </div>            
            
        </div>

    </form>
  

<br><br>
@endsection
