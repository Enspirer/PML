@extends('backend.layouts.app')

@section('title', __('Watermark'))

@section('content')

    
<div class="row">
    <div class="col-12">
        <form action="{{route('admin.watermark_update')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
        
            <div class="card">
                <div class="card-body">
                    
                    
                    <div class="form-group">
                        <label class="mb-3">Watermark</label>

                        <div class="form-group">                            
                            <input type="file" class="form-control" name="watermark">
                            <br>
                            
                            <img src="{{ url('watermark',get_settings('watermark')) }}" style="width: 40%">
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
