@extends('backend.layouts.app')

@section('title', __('Create New'))

@section('content')

<form action="{{route('admin.property_news.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea type="text" id="editor" class="form-control" name="description"></textarea>
                            </div> 
                        </div>   
                        <div class="form-group">
                            <label>Feature Image <span class="text-danger">*</span></label>
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose File</div>
                                <input type="hidden" name="feature_image" class="selected-files" >
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>  

                        <div class="form-group">
                            <label>Featured <span class="text-danger">*</span></label>
                            <select class="form-control custom-select" name="featured" required>
                                <option value="Enabled">Enable</option>   
                                <option value="Disabled" selected>Disable</option>                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Trending <span class="text-danger">*</span></label>
                            <select class="form-control custom-select" name="trending" required>
                                <option value="Enabled">Enable</option>   
                                <option value="Disabled" selected>Disable</option>                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Most Viewed <span class="text-danger">*</span></label>
                            <select class="form-control custom-select" name="most_viewed" required>
                                <option value="Enabled">Enable</option>   
                                <option value="Disabled" selected>Disable</option>                                
                            </select>
                        </div>    

                        <div class="form-group">
                            <label>Order <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="order" required>
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

                <button type="submit" class="btn btn-success pull-right">Create New</button><br>
                
            </div><br>
            
            
            
        </div>

    </form>

    
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            } )
            .then( editor => {
                window.editor = editor;
            } )
            .catch( err => {
                console.error( err.stack );
            } );
    </script>

<br><br>

@endsection
