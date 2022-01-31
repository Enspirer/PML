@extends('backend.layouts.app')

@section('title', __('Tips For Sellers'))

@section('content')

    
<div class="row">
    <div class="col-12">
        <form action="{{route('admin.tips_for_sellers_update')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
        
            <div class="card">
                <div class="card-body">
                    
                    <div class="form-group">
                        <label>Tips For Sellers</label>
                        <textarea type="text" id="editor" class="form-control mt-2" name="tips_for_sellers" rows="8" required> {{ $tips_for_sellers->value }} </textarea>
                    </div>                    
                        
                </div>
            </div>
           
            <button type="submit" class="btn rounded-pill text-light px-4 py-2 me-2 btn-success">Update</button><br><br><br>
            
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
