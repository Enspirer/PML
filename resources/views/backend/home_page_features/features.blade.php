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
<form action="{{ route('admin.country.featuresUpdate') }}" method="POST">
    <div class="row">
    
        {{csrf_field()}}
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label>Feature Title</label>
                        @if(json_decode($country->features_manager) != null)
                            <input type="text" class="form-control" name="featureTitle1" value="{{ json_decode($country->features_manager)['0']->title }}" required>
                        @else
                            <input type="text" class="form-control" name="featureTitle1" value="" required>
                        @endif
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-5 text-end">
                            <a href="" type="button" class="btn bg-primary" data-bs-toggle="modal" data-bs-target="#addProperty1">Add Property</a>
                        </div>
                    </div>

                    <div class="properties1">
                        @if(json_decode($country->features_manager) != null)
                            @if(json_decode($country->features_manager)[0]->properties != null)
                                @foreach(json_decode($country->features_manager)[0]->properties as $prop)
                                    @if(App\Models\Properties::where('id', $prop)->first() == null)
                                        <div class="row border mt-2">
                                            <h4 align="center" style="color:grey; margin: 30px 0 30px 0;">Property Not Found!</h4>
                                        </div>
                                    @else
                                        <div class="row border align-items-center p-1 mt-2 property-row">
                                            <div class="col-6">                                            
                                                    <img src="{{url('image_assest', App\Models\Properties::where('id', $prop)->first()->feature_image_id)}}" alt="" class="img-fluid" style="height: 150px!important; object-fit: cover!important; width: 100%";>
                                                                                        
                                            </div>
                                            <div class="col-6">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-9">
                                                        <input type="hidden" name="properties1[]" value="{{ $prop }}" required>
                                                    </div>
                                                </div>
                                                
                                                <p class="fw-bold mb-0">{{ App\Models\Properties::where('id', $prop)->first()->name }}</p>
                                                <p class="mb-0" style="font-size: 0.8rem;">Transaction Type: {{ App\Models\Properties::where('id', $prop)->first()->transaction_type }}</p>
                                                <p class="mb-0" style="font-size: 0.8rem;">Country: {{ App\Models\Properties::where('id', $prop)->first()->country }}</p>
                                            </div>

                                            <div class="row justify-content-end">
                                                <div class="col-5 text-end">
                                                    <button type="button" name="delete" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
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

        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label>Feature Title</label>
                        @if(json_decode($country->features_manager) != null)
                            <input type="text" class="form-control" name="featureTitle2" value="{{ json_decode($country->features_manager)['1']->title }}" required>
                        @else
                            <input type="text" class="form-control" name="featureTitle2" value="" required>
                        @endif
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-5 text-end">
                            <a href="" type="button" class="btn bg-primary" data-bs-toggle="modal" data-bs-target="#addProperty2">Add Property</a>
                        </div>
                    </div>

                    <div class="properties2">
                        @if(json_decode($country->features_manager) != null)
                            @if(json_decode($country->features_manager)[1]->properties != null)
                                @foreach(json_decode($country->features_manager)[1]->properties as $prop)
                                    @if(App\Models\Properties::where('id', $prop)->first() == null)
                                        <div class="row border mt-2">
                                            <h4 align="center" style="color:grey; margin: 30px 0 30px 0;">Property Not Found!</h4>
                                        </div>
                                    @else
                                        <div class="row border align-items-center p-1 mt-2 property-row">
                                            <div class="col-6">
                                                <img src="{{url('image_assest', App\Models\Properties::where('id', $prop)->first()->feature_image_id)}}" alt="" class="img-fluid" style="height: 150px!important; object-fit: cover!important; width: 100%";>
                                            </div>
                                            <div class="col-6">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-9">
                                                        <input type="hidden" name="properties2[]" value="{{ $prop }}" required>
                                                    </div>
                                                </div>
                                                
                                                <p class="fw-bold mb-0">{{ App\Models\Properties::where('id', $prop)->first()->name }}</p>
                                                <p class="mb-0" style="font-size: 0.8rem;">Transaction Type: {{ App\Models\Properties::where('id', $prop)->first()->transaction_type }}</p>
                                                <p class="mb-0" style="font-size: 0.8rem;">Country: {{ App\Models\Properties::where('id', $prop)->first()->country }}</p>
                                            </div>

                                            <div class="row justify-content-end">
                                                <div class="col-5 text-end">
                                                    <button type="button" name="delete" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
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
            <button type="submit" class="btn btn-success pull-right px-5 py-2 fs-6">Update</button><br>
            <input type="hidden" class="form-control" name="hid_id" value="{{ $country->id }}" required>
        </div>
    
    </div>
</form>


<!-- Modal -->

    <div class="modal fade" id="addProperty1" tabindex="-1" aria-labelledby="addProperty1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Property1</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="property" class="form-label mb-0 required">Select Property</label>
                    <select class="form-select" aria-label="property" name="property" id="property" required>
                        <option selected disabled value="">Choose...</option>
                        @foreach($properties as $property)
                            <option value="{{ $property->name }}">{{ $property->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button save-btn" class="btn btn-primary" onclick="addProperty1()">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addProperty2" tabindex="-1" aria-labelledby="addProperty2Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Property2</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="property" class="form-label mb-0 required">Select Property</label>
                    <select class="form-select" aria-label="property" name="property" id="property" required>
                        <option selected disabled value="">Choose...</option>
                        @foreach($properties as $property)
                            <option value="{{ $property->name }}">{{ $property->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button save-btn" class="btn btn-primary" onclick="addProperty2()">Save changes</button>
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
                                    <img src="{{url('/')}}/image_assest/${properties[i]['feature_image_id']}" alt="" class="img-fluid" style="height: 150px!important; object-fit: cover!important; width: 100%";>
                                </div>
                                <div class="col-6">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-9">
                                            <input type="hidden" name="properties1[]" value="${properties[i]['id']}" required>
                                        </div>
                                    </div>
                                    
                                    <p class="fw-bold mb-0">${properties[i]['name']}</p>
                                    <p class="mb-0" style="font-size: 0.8rem;">Transaction Type: ${properties[i]['transaction_type']}</p>
                                    <p class="mb-0" style="font-size: 0.8rem;">Country: ${properties[i]['country']}</p>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-5 text-end">
                                        <button type="button" name="delete" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                    </div>
                                </div>
                            </div>
                        `
            }
        }

        $('.properties1').append(template);
        deleteProperty();
    }


    function addProperty2() {

        let propertyName = $('#addProperty2 select').val();

        let template = "";
        
        for (let i = 0; i < properties.length; i++) {
            if(properties[i]['name'] == propertyName) {
                template = `
                            <div class="row border align-items-center p-1 mt-2 property-row">
                                <div class="col-6">
                                    <img src="{{url('/')}}/image_assest/${properties[i]['feature_image_id']}" alt="" class="img-fluid" style="height: 150px!important; object-fit: cover!important; width: 100%";>
                                </div>
                                <div class="col-6">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-9">
                                            <input type="hidden" name="properties2[]" value="${properties[i]['id']}" required>
                                        </div>
                                    </div>
                                    
                                    <p class="fw-bold mb-0">${properties[i]['name']}</p>
                                    <p class="mb-0" style="font-size: 0.8rem;">Transaction Type: ${properties[i]['transaction_type']}</p>
                                    <p class="mb-0" style="font-size: 0.8rem;">Country: ${properties[i]['country']}</p>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-5 text-end">
                                        <button type="button" name="delete" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                    </div>
                                </div>
                            </div>
                        `
            }
        }

        $('.properties2').append(template);
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
