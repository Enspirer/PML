@extends('backend.layouts.app')

@section('title', __('Edit Industry'))

@section('content')

    <form action="{{route('admin.category.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label>Name <span class="text-danger">*</span></label>
                            <textarea type="text" class="form-control" name="name" rows="3" required> {{ $categories->name }} </textarea>
                        </div>                        
                        <div class="form-group">
                            <label>Description</label>
                            <textarea type="text" class="form-control" name="description" rows="2"> {{ $categories->description }} </textarea>
                        </div>                         
                
                        <div class="form-group">
                            <label>Icon
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose File</div>
                                <input type="hidden" name="icon" value="{{ $categories->icon }}" class="selected-files" >
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label>Featured News <span class="text-danger">*</span></label>
                            <select class="form-control" name="featured_news" required>
                                <option value="1" {{ $categories->is_feature == 1 ? "selected" : "" }}>Enable</option>   
                                <option value="0" {{ $categories->is_feature == 0 ? "selected" : "" }}>Disable</option>                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Status <span class="text-danger">*</span></label>
                            <select class="form-control custom-select" name="status" required>
                                <option value="Enabled" {{ $categories->status == 'Enabled' ? "selected" : "" }}>Enable</option>   
                                <option value="Disabled" {{ $categories->status == 'Disabled' ? "selected" : "" }}>Disable</option>                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Order <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="order" value="{{ $categories->order }}" required>
                        </div>
                        
                    </div>
                </div>
                <input type="hidden" name="hidden_id" value="{{ $categories->id }}"/>
                <a href="{{route('admin.category.index')}}" class="btn btn-primary pull-right ml-4">Back</a>&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-success pull-right">Update</button><br>
            </div><br>
            
            

        </div>

    </form>


<br><br>
@endsection
