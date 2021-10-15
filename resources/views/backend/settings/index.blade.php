@extends('backend.layouts.app')

@section('title', __('General Settings'))

@section('content')


<div class="row">
    <div class="col-12">
        <form action="{{route('admin.settings_update')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
        
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">                            
                            <div class="form-group">
                                <label>App Title</label>
                                <input type="text" class="form-control mt-2" name="app_title" value="{{ $app_title->value }}"/>
                            </div> 
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control mt-2" name="address" value="{{ $address->value }}"/>
                            </div>    
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control mt-2" name="email" value="{{ $email->value }}"/>
                            </div>  
                            <div class="form-group">
                                <label>Contact Us Admin Email</label>
                                <input type="text" class="form-control mt-2" name="contact_us_admin_email" value="{{ $contact_us_admin_email->value }}"/>
                            </div> 
                            <div class="form-group">
                                <label>Fax</label>
                                <input type="text" class="form-control mt-2" name="fax" value="{{ $fax->value }}"/>
                            </div>  
                            <div class="row mt-4">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Phone Number 1</label>
                                        <input type="number" class="form-control mt-2" name="phone_number[]" value="{{ json_decode($phone_number->value)[0]->number }}"/>
                                    </div>
                                </div> 
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Phone Number 2</label>
                                        <input type="number" class="form-control mt-2" name="phone_number[]" value="{{ json_decode($phone_number->value)[1]->number }}"/>
                                    </div> 
                                </div>
                            </div>       
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">                            
                            <div class="form-group">
                                <label>Twitter</label>
                                <input type="text" class="form-control mt-2" name="twitter" value="{{ $twitter->value }}"/>
                            </div>    
                            <div class="form-group">
                                <label>LinkdIn</label>
                                <input type="text" class="form-control mt-2" name="linkdin" value="{{ $linkdin->value }}"/>
                            </div>  
                            <div class="form-group">
                                <label>Facebook</label>
                                <input type="text" class="form-control mt-3" name="facebook" value="{{ $facebook->value }}"/>
                            </div>  
                            <div class="form-group">
                                <label>Youtube</label>
                                <input type="text" class="form-control mt-3" name="youtube" value="{{ $youtube->value }}"/>
                            </div> 
                            
                            <div class="form-group mt-4">
                                <label>News Section</label>
                                <select class="form-control" name="news_section_active">        
                                    <option value="1" {{ $news_section_active->value == 1 ? "selected" : "" }}>Enable</option>   
                                    <option value="0" {{ $news_section_active->value == 0 ? "selected" : "" }}>Disable</option>                            
                                </select>  
                            </div>

                            <div class="form-group">
                                <label>Slider Active</label>
                                <select class="form-control" name="slider_active">        
                                    <option value="1" {{ $slider_active->value == 1 ? "selected" : "" }}>Enable</option>   
                                    <option value="0" {{ $slider_active->value == 0 ? "selected" : "" }}>Disable</option>                            
                                </select>  
                            </div>
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



@endsection
