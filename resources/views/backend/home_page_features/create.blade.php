@extends('backend.layouts.app')

@section('title', __('Create New'))

@section('content')

<style>
.list-group .list-group-item {
    border-radius: 0;
    cursor: move;
}
.list-group .list-group-item:hover {
    background-color:#dcdada;
}
</style>

    <!-- <div class="form-group">
            <div class="row m-0">
              
              @if(session()->has('error'))
                  <div class="alert alert-danger">
                      {{ session()->get('error') }}
                  </div>
              @endif
                                      
            </div>
        </div> -->
    <form action="{{ route('admin.home_page_features.store') }}" method="POST">
    {{csrf_field()}}
        <div class="row justify-content-center">

            <div class="col-9">
                <div class="card">
                    <div class="card-body text-center">

                        <div class="row mb-5">
                            <div class="col-12">
                                @if($count < 6)
                                    <a href="" type="button" class="col-12 btn bg-primary" data-toggle="modal" data-target="#addProperty1">Add Featured Properties Here</a>
                                @else
                                    <button href="" type="button" class="col-12 btn bg-primary" disabled>Maximum Properties Count Reached</button>
                                @endif
                            </div>
                        </div>

                        <div class="properties1">
                            @if(json_decode($settings->value) != null)
                                @if(json_decode($settings->value)[0]->properties != null)
                                    @foreach(json_decode($settings->value)[0]->properties as $prop)
                                        @if(App\Models\Properties::where('id', $prop)->first() == null)
                                            <div class="row border mt-2">
                                                <h4 align="center" style="color:grey; margin: 30px 0 30px 0;">Property Not Found!</h4>
                                            </div>
                                        @else
                                            <div class="row border align-items-center p-1 mt-2 property-row">
                                                <div class="col-6">                                            
                                                        <img src="{{ uploaded_asset(App\Models\Properties::where('id', $prop)->first()->feature_image_id) }}" alt="" class="img-fluid" style="height: 150px!important; object-fit: cover!important; width: 100%";>
                                                                                            
                                                </div>
                                                <div class="col-4">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-9">
                                                            <input type="hidden" name="properties1[]" value="{{ $prop }}" required>
                                                        </div>
                                                    </div>
                                                    
                                                    <p class="fw-bold mb-2">{{ App\Models\Properties::where('id', $prop)->first()->name }}</p>
                                                    <p class="mb-1" style="font-size: 0.8rem;">Transaction Type: {{ App\Models\Properties::where('id', $prop)->first()->transaction_type }}</p>
                                                    <p class="mb-1" style="font-size: 0.8rem;">Price:$ {{ App\Models\Properties::where('id', $prop)->first()->price }}</p>
                                                    <p class="mb-0" style="font-size: 0.8rem;">City: {{ App\Models\Properties::where('id', $prop)->first()->city }}</p>
                                                </div>

                                                <div class="row justify-content-end">
                                                    <div class="col-5 text-end">
                                                        <button type="button" name="delete" class="delete btn btn-danger mb-2 btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif   
                                    @endforeach 
                                @else
                                    
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="text-center mt-3">
                <button type="submit" class="btn btn-success pull-right px-5 py-2 fs-6">Submit</button><br>
                <input type="hidden" class="form-control" name="hid_id" value="{{ $settings->id }}" required>
            </div>
        
        </div>
    </form>


<!-- Modal -->

    <div class="modal fade" id="addProperty1" tabindex="-1" aria-labelledby="addProperty1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Property</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="property" class="form-label mb-2 required">Select Property</label>
                    <select class="form-select" aria-label="property" name="property" id="property" required>
                        <option selected disabled value="">Choose...</option>
                        @foreach($properties as $property)
                            <option value="{{ $property->name }}">{{ $property->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button save-btn" class="btn btn-primary" onclick="addProperty1()">Save changes</button>
                </div>
            </div>
        </div>
    </div>


  

<br><br>

<!-- <script>
    new Sortable(example2Left, {
        group: 'shared', 
        animation: 150
    });
    new Sortable(example2Right, {
        group: 'shared',
        animation: 150
    });  
</script>    -->


<script>

    let properties = <?php echo json_encode($properties); ?>;

    function addProperty1() {
        let propertyName = $('#addProperty1 select').val();

        let template = "";
        
        for (let i = 0; i < properties.length; i++) {
            if(properties[i]['name'] == propertyName) {
                template = `
                            <div class="row border align-items-center p-1 mt-2 property-row">
                                <div class="col-6">
                                    <img src="{{url('/')}}/image_assester/${properties[i]['feature_image_id']}" alt="" class="img-fluid" style="height: 150px!important; object-fit: cover!important; width: 100%";>
                                </div>
                                <div class="col-4">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-9">
                                            <input type="hidden" name="properties1[]" value="${properties[i]['id']}" required>
                                        </div>
                                    </div>
                                    
                                    <p class="fw-bold mb-2">${properties[i]['name']}</p>
                                    <p class="mb-1" style="font-size: 0.8rem;">Transaction Type: ${properties[i]['transaction_type']}</p>
                                    <p class="mb-1" style="font-size: 0.8rem;">Price:$ ${properties[i]['price']}</p>
                                    <p class="mb-0" style="font-size: 0.8rem;">City: ${properties[i]['city']}</p>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-5 text-end">
                                        <button type="button" name="delete" class="delete btn btn-danger mb-2 btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                    </div>
                                </div>
                            </div>
                        `
            }
        }

        $('.properties1').append(template);
        deleteProperty();
    }


    

    function deleteProperty() {
        $('.delete').on('click', function() {
            $(this).parents('.property-row').remove();
        });
    }

    $(document).ready(function() {
        $('.delete').on('click', function() {
            $(this).parents('.property-row').remove();
        });
    });
    
</script>


@endsection
