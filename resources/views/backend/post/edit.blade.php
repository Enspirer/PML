@extends('backend.layouts.app')

@section('title', __('Edit'))

@section('content')

<form action="{{route('admin.post.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" value="{{ $post->title }}" required>
                        </div>
                        <div class="form-group">
                            <label>Description <span class="text-danger">*</span></label>
                            <textarea type="text" class="form-control" name="description" rows="6" required>{{ $post->description }}</textarea>
                        </div>                                                   
                        <div class="form-group">
                            <label>Category <span class="text-danger">*</span></label>
                            <select name="category" class="form-control" id="category" required>
                                <option value="" selected disabled>-- Select Category --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $post->category == $category->id ? "selected" : ""}}>{{ $category->name }}</option>
                                    @endforeach
                            </select>
                        </div>  
                        <div class="form-group">
                            <label>Order <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="order" value="{{ $post->order }}" required>
                        </div>
                        <div class="form-group">
                            <label>Status <span class="text-danger">*</span></label>
                            <select class="form-control" name="status" required>
                                <option value="Enabled" {{$post->status == 'Enabled' ? "selected" : ""}}>Enable</option>   
                                <option value="Disabled" {{$post->status == 'Disabled' ? "selected" : ""}}>Disable</option>                                
                            </select>
                        </div>
                        
                    </div>
                </div>
                
            </div><br>
            
            <div class="col-md-7">               

                <div class="card">
                    <div class="card-body">
                        <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">                       
                            <div class="form-group">
                                <label>Feature Image
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control file-amount">Choose File</div>
                                    <input type="hidden" name="feature_image" value="{{ $post->feature_image }}" class="selected-files" >
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label>Type <span class="text-danger">*</span></label>
                                <select class="form-control" name="type" id="type" onchange="yesnoCheck(this);" required>
                                    <option value="" selected disabled>Select...</option> 
                                    <option value="article" {{$post->type == 'article' ? "selected" : "" }}>Article</option>   
                                    <option value="youtube" {{$post->type == 'youtube' ? "selected" : "" }}>Youtube Link</option>                                
                                </select>
                            </div>
                            <div class="form-group" id="article" style="display: none;">
                                <div class="form-group">
                                    <label>Article</label>
                                    <textarea type="text" id="editor" class="form-control" name="article">{{ $post->article }}</textarea>
                                </div> 
                            </div>   
                            <div class="form-group" id="youtube" style="display: none;">
                                <div class="form-group">
                                    <label>Youtube Link</label>
                                    <input type="text" class="form-control" value="{{ $post->youtube }}" name="youtube">
                                </div>
                            </div>                              

                        </div>
                    </div>
                    
                </div>     

                <input type="hidden" name="hidden_id" value="{{ $post->id }}" />
                <button type="submit" class="btn btn-success pull-right">Update Post</button><br>
            </div><br>
            
        </div>

    </form>

    <script>
        function yesnoCheck(that) {
            if (that.value == 'article') {
                document.getElementById("article").style.display = "block";
            } else {
                document.getElementById("article").style.display = "none";
            }
            if (that.value == 'youtube') {
                document.getElementById("youtube").style.display = "block";
            } else {
                document.getElementById("youtube").style.display = "none";
            }
        }
    </script> 
    <script>
        function yesnoCheck(that) {
            if (that.value == 'article') {
                document.getElementById("article").style.display = "block";
            } else {
                document.getElementById("article").style.display = "none";
            }
            if (that.value == 'youtube') {
                document.getElementById("youtube").style.display = "block";
            } else {
                document.getElementById("youtube").style.display = "none";
            }
        }

        $(document).ready(function(){
            if($('#type').val() == 'article'){
                $('#article').css('display','block');
            }
            else{
                $('#article').css('display','none');
            }  
            if($('#type').val() == 'youtube'){
                $('#youtube').css('display','block');
            }
            else{
                $('#youtube').css('display','none');
            }           
        });
        
    </script> 
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
