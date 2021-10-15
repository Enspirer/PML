@extends('backend.layouts.app')

@section('title', __('About Us'))

@section('content')

    
<div class="row">
    <div class="col-12">
        <form action="{{route('admin.about_us_update')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
        
            <div class="card">
                <div class="card-body">
                    
                    <div class="form-group">
                        <label>About Us</label>
                        <textarea type="text" id="editor" class="form-control mt-2" name="about_us" rows="8" required>{!! $about_us->value !!}</textarea>
                    </div>                    
                        
                </div>
            </div>
            <div align="center">
                <button type="submit" class="btn rounded-pill text-light px-4 py-2 me-2 btn-success">Update</button><br><br><br>
            </div>
        </form>
    </div>         

            
</div>    

<br><br>

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

@endsection
