@extends('backend.layouts.app')

@section('title', __('Edit'))

@section('content')

<form action="{{route('admin.help_supports.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
            <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" value="{{$help_supports->title}}" required>
                        </div>
                        <div class="form-group">
                            <label>Category <span class="text-danger">*</span></label>
                            <select name="category" class="form-control custom-select" id="category" required>
                                <option value="" selected disabled>-- Select Category --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $help_supports->category == $category->id ? "selected" : ""}}>{{ $category->name }}</option>
                                    @endforeach
                            </select>
                        </div>  
                        <div class="form-group">
                            <div class="form-group">
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea type="text" class="form-control" name="description" required>{{$help_supports->description}}</textarea>
                            </div> 
                        </div>   
                        <div class="form-group">
                            <label>Order <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" value="{{$help_supports->order}}" name="order" required>
                        </div>
                        <div class="form-group">
                            <label>Status <span class="text-danger">*</span></label>
                            <select class="form-control custom-select" name="status" required>
                                <option value="Enabled" {{$help_supports->status == 'Enabled' ? "selected" : ""}}>Enable</option>   
                                <option value="Disabled" {{$help_supports->status == 'Disabled' ? "selected" : ""}}>Disable</option>                                
                            </select>
                        </div>
                        
                    </div>
                </div>

                <input type="hidden" name="hidden_id" value="{{ $help_supports->id }}" />
                <button type="submit" class="btn btn-success pull-right">Update</button><br>

            </div><br>            
                        
        </div>

    </form>
    
<br><br>

@endsection
