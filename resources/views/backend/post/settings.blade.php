@extends('backend.layouts.app')

@section('title', __('General Settings'))

@section('content')


<div class="row">
    <div class="col-12">
        <form action="{{route('admin.pro_tal_settings.store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
        
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">                            
                            <div class="form-group mt-2">
                                <label>Home Featured <span class="text-danger">*</span></label>
                                <select class="form-control" name="property_talk_featured">       
                                    @foreach($all_posts as $key => $all_post) 
                                        <option value="{{$all_post->id}}" {{ $property_talk_featured->value == $all_post->id ? "selected" : "" }}> {{$all_post->title}} </option>  
                                    @endforeach                          
                                </select>  
                            </div>      
                        </div>
                    </div>
                </div>                
            </div>                        
        
            <div align="center">
                <button type="submit" class="btn rounded-pill text-light px-4 py-2 me-2 btn-success">Update</button><br><br><br>
            </div>

        </form>
    </div>         

            
</div>



@endsection
