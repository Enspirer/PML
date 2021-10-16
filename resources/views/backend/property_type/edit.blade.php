@extends('backend.layouts.app')

@section('title', __('Edit'))

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
    
<div class="row">
    <div class="col-6">
        <form action="{{route('admin.property_type.update')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
        
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label>Property Type Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="property_type_name" value="{{ $property_type->property_type_name }}" required>
                        </div>
                        <div class="form-group">
                            <label>Property Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="property_description" rows="5" required>{{ $property_type->property_description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Status <span class="text-danger">*</span></label>
                            <select class="form-control" name="status" required> 
                                <option value="1" {{ $property_type->status == '1' ? "selected" : "" }}>Enable</option>   
                                <option value="0" {{ $property_type->status == '0' ? "selected" : "" }}>Disable</option>                                                                    
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Activated Field <span class="text-danger">*</span></label>
                        </div>

                        <div class="form-group">                       
                                <div style="border-style: ridge;border-width: 3px;padding: 50px;">

                                    <div id="example2Left" class="list-group mb-4 mt-3" data-id="1">

                                        @foreach(json_decode($property_type->activated_fields) as $key => $type)

                                        @if($type == 'Land Size')
                                            <div class="list-group-item d-flex align-items-center justify-content-between" data-id="2">
                                                <div>
                                                    <p class="mb-0 d-inline-flex align-items-center">
                                                    Land Size</p>
                                                    <input type="hidden" name="item[]" value="Land Size"/>
                                                </div>
                                            </div>
                                        @elseif($type == 'Zoning Type')
                                            <div class="list-group-item d-flex align-items-center justify-content-between" data-id="3">
                                                <div>
                                                    <p class="mb-0 d-inline-flex align-items-center">
                                                    Zoning Type</p>
                                                    <input type="hidden" name="item[]" value="Zoning Type"/>
                                                </div>
                                            </div>
                                        @elseif($type == 'Number Of Units')
                                            <div class="list-group-item d-flex align-items-center justify-content-between" data-id="4">
                                                <div>
                                                    <p class="mb-0 d-inline-flex align-items-center">
                                                    Number Of Units</p>
                                                    <input type="hidden" name="item[]" value="Number Of Units"/>
                                                </div>
                                            </div>
                                        @elseif($type == 'Building Size')
                                            <div class="list-group-item d-flex align-items-center justify-content-between" data-id="5">
                                                <div>
                                                    <p class="mb-0 d-inline-flex align-items-center">
                                                    Building Size</p>
                                                    <input type="hidden" name="item[]" value="Building Size"/>
                                                </div>
                                            </div> 
                                        @elseif($type == 'Farm Type')
                                            <div class="list-group-item d-flex align-items-center justify-content-between" data-id="6">
                                                <div>
                                                    <p class="mb-0 d-inline-flex align-items-center">
                                                    Farm Type</p>
                                                    <input type="hidden" name="item[]" value="Farm Type"/>
                                                </div>
                                            </div> 
                                        @elseif($type == 'Building Type')    
                                            <div class="list-group-item d-flex align-items-center justify-content-between" data-id="7">
                                                <div>
                                                    <p class="mb-0 d-inline-flex align-items-center">
                                                    Building Type</p>
                                                    <input type="hidden" name="item[]" value="Building Type"/>
                                                </div>
                                            </div>
                                        @elseif($type == 'Open House Only')    
                                            <div class="list-group-item d-flex align-items-center justify-content-between" data-id="7">
                                                <div>
                                                    <p class="mb-0 d-inline-flex align-items-center">
                                                    Open House Only</p>
                                                    <input type="hidden" name="item[]" value="Open House Only"/>
                                                </div>
                                            </div>
                                        @elseif($type == 'Parking Type')    
                                            <div class="list-group-item d-flex align-items-center justify-content-between" data-id="7">
                                                <div>
                                                    <p class="mb-0 d-inline-flex align-items-center">
                                                    Parking Type</p>
                                                    <input type="hidden" name="item[]" value="Parking Type"/>
                                                </div>
                                            </div>
                                        @elseif($type == 'Beds')
                                            <div class="list-group-item d-flex align-items-center justify-content-between" data-id="7">
                                                <div>
                                                    <p class="mb-0 d-inline-flex align-items-center">
                                                    Beds</p>
                                                    <input type="hidden" name="item[]" value="Beds"/>
                                                </div>
                                            </div>
                                        @else
                                            <div class="list-group-item d-flex align-items-center justify-content-between" data-id="7">
                                                <div>
                                                    <p class="mb-0 d-inline-flex align-items-center">
                                                    Baths</p>
                                                    <input type="hidden" name="item[]" value="Baths"/>
                                                </div>
                                            </div> 

                                        @endif                                           

                                        @endforeach 

                                    </div>
                                </div>
                        </div>        
                            
                        
                    </div>
                </div>

                <input type="hidden" name="hidden_id" value="{{ $property_type->id }}"/>
                <a href="{{route('admin.property_type.index')}}" class="btn btn-info pull-right ml-4 px-4 py-2">Back</a>&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-success pull-right px-4 py-2">Update</button><br><br><br>
            
        </form>
    </div>
            

            <div class="col-6">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group text-center">
                            <label>Attributes</label>
                        </div>
                        <div style="border-style: ridge;border-width: 3px;padding: 40px;">
                            <div id="example2Right" class="list-group mb-4" data-id="2">  

                                @if (in_array("Land Size", json_decode($property_type->activated_fields)))
                                        
                                @else                              
                                    <div class="list-group-item d-flex align-items-center justify-content-between" data-id="2">
                                        <div>
                                            <p class="mb-0 d-inline-flex align-items-center">
                                            Land Size</p>
                                            <input type="hidden" name="item[]" value="Land Size"/>
                                        </div>
                                    </div>
                                @endif

                                @if (in_array("Zoning Type", json_decode($property_type->activated_fields)))
                                        
                                @else                              
                                    <div class="list-group-item d-flex align-items-center justify-content-between" data-id="3">
                                        <div>
                                            <p class="mb-0 d-inline-flex align-items-center">
                                            Zoning Type</p>
                                            <input type="hidden" name="item[]" value="Zoning Type"/>
                                        </div>
                                    </div>
                                @endif

                                @if (in_array("Number Of Units", json_decode($property_type->activated_fields)))
                                        
                                @else                              
                                    <div class="list-group-item d-flex align-items-center justify-content-between" data-id="4">
                                        <div>
                                            <p class="mb-0 d-inline-flex align-items-center">
                                            Number Of Units</p>
                                            <input type="hidden" name="item[]" value="Number Of Units"/>
                                        </div>
                                    </div>
                                @endif

                                @if (in_array("Building Size", json_decode($property_type->activated_fields)))
                                        
                                @else                              
                                    <div class="list-group-item d-flex align-items-center justify-content-between" data-id="5">
                                        <div>
                                            <p class="mb-0 d-inline-flex align-items-center">
                                            Building Size</p>
                                            <input type="hidden" name="item[]" value="Building Size"/>
                                        </div>
                                    </div> 
                                @endif

                                @if (in_array("Farm Type", json_decode($property_type->activated_fields)))
                                        
                                @else                              
                                    <div class="list-group-item d-flex align-items-center justify-content-between" data-id="6">
                                        <div>
                                            <p class="mb-0 d-inline-flex align-items-center">
                                            Farm Type</p>
                                            <input type="hidden" name="item[]" value="Farm Type"/>
                                        </div>
                                    </div> 
                                @endif

                                @if (in_array("Building Type", json_decode($property_type->activated_fields)))
                                        
                                @else                              
                                    <div class="list-group-item d-flex align-items-center justify-content-between" data-id="7">
                                        <div>
                                            <p class="mb-0 d-inline-flex align-items-center">
                                            Building Type</p>
                                            <input type="hidden" name="item[]" value="Building Type"/>
                                        </div>
                                    </div>
                                @endif

                                @if (in_array("Open House Only", json_decode($property_type->activated_fields)))
                                        
                                @else                              
                                    <div class="list-group-item d-flex align-items-center justify-content-between" data-id="7">
                                        <div>
                                            <p class="mb-0 d-inline-flex align-items-center">
                                            Open House Only</p>
                                            <input type="hidden" name="item[]" value="Open House Only"/>
                                        </div>
                                    </div>
                                @endif

                                @if (in_array("Parking Type", json_decode($property_type->activated_fields)))
                                        
                                @else                              
                                    <div class="list-group-item d-flex align-items-center justify-content-between" data-id="7">
                                        <div>
                                            <p class="mb-0 d-inline-flex align-items-center">
                                            Parking Type</p>
                                            <input type="hidden" name="item[]" value="Parking Type"/>
                                        </div>
                                    </div>
                                @endif

                                @if (in_array("Beds", json_decode($property_type->activated_fields)))
                                        
                                @else                              
                                    <div class="list-group-item d-flex align-items-center justify-content-between" data-id="7">
                                        <div>
                                            <p class="mb-0 d-inline-flex align-items-center">
                                            Beds</p>
                                            <input type="hidden" name="item[]" value="Beds"/>
                                        </div>
                                    </div>
                                @endif

                                @if (in_array("Baths", json_decode($property_type->activated_fields)))
                                        
                                @else                              
                                    <div class="list-group-item d-flex align-items-center justify-content-between" data-id="7">
                                        <div>
                                            <p class="mb-0 d-inline-flex align-items-center">
                                            Baths</p>
                                            <input type="hidden" name="item[]" value="Baths"/>
                                        </div>
                                    </div> 
                                @endif                               

                            </div>
                        </div>    
                    </div>
                </div>    
            </div> 
</div>    

<br><br>


<script>
    new Sortable(example2Left, {
        group: 'shared', 
        animation: 150
    });
    new Sortable(example2Right, {
        group: 'shared',
        animation: 150
    });  
</script>   


@endsection
