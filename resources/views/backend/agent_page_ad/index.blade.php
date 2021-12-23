@extends('backend.layouts.app')

@section('title', __('Property Page Advertisement'))

@section('content')

<style>
    
    .ui-w-80 {
        width: 80px !important;
        height: auto;
    }
    .btn-default {
        border-color: rgba(24,28,33,0.1);
        background: rgba(0,0,0,0);
        color: #4E5155;
    }
    label.btn {
        margin-bottom: 0;
    }
    .btn-outline-primary {
        border-color: #26B4FF;
        background: transparent;
        color: #26B4FF;
    }
    .btn {
        cursor: pointer;
    }
    .text-light {
        color: #babbbc !important;
    }
    .btn-facebook {
        border-color: rgba(0,0,0,0);
        background: #3B5998;
        color: #fff;
    }
    .btn-instagram {
        border-color: rgba(0,0,0,0);
        background: #000;
        color: #fff;
    }
    .card {
        background-clip: padding-box;
        box-shadow: 0 1px 4px rgba(24,28,33,0.012);
    }
    .row-bordered {
        overflow: hidden;
    }
    .account-settings-fileinput {
        position: absolute;
        visibility: hidden;
        width: 1px;
        height: 1px;
        opacity: 0;
    }
    .account-settings-links .list-group-item.active {
        font-weight: bold !important;
    }
    html:not(.dark-style) .account-settings-links .list-group-item.active {
        background: transparent !important;
    }
    .account-settings-multiselect ~ .select2-container {
        width: 100% !important;
    }
    .light-style .account-settings-links .list-group-item {
        padding: 0.85rem 1.5rem;
        border-color: rgba(24, 28, 33, 0.03) !important;
    }
    .light-style .account-settings-links .list-group-item.active {
        color: #4e5155 !important;
    }
    .material-style .account-settings-links .list-group-item {
        padding: 0.85rem 1.5rem;
        border-color: rgba(24, 28, 33, 0.03) !important;
    }
    .material-style .account-settings-links .list-group-item.active {
        color: #4e5155 !important;
    }
    .dark-style .account-settings-links .list-group-item {
        padding: 0.85rem 1.5rem;
        border-color: rgba(255, 255, 255, 0.03) !important;
    }
    .dark-style .account-settings-links .list-group-item.active {
        color: #fff !important;
    }
    .light-style .account-settings-links .list-group-item.active {
        color: #4E5155 !important;
    }
    .light-style .account-settings-links .list-group-item {
        padding: 0.85rem 1.5rem;
        border-color: rgba(24,28,33,0.03) !important;
    }
</style>    

<div class="light-style flex-grow-1 container-p-y">

    <div class="card overflow-hidden">
      <div class="row no-gutters row-bordered row-border-light">
        <div class="col-md-3 mt-3 pt-0">
          <div class="list-group list-group-flush account-settings-links">
            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#ad1">Advertisement 1</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#ad2">Advertisement 2</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#info">Advertisement 3</a>
        </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane fade active show" id="ad1">
                <div class="card-body">
                   
                    <form action="{{route('admin.agents_page_ad.update1')}}" method="post" enctype="multipart/form-data">                    
                        {{csrf_field()}}
                            
                            <div class="form-group">
                                <label>Image <span class="text-danger">*</span></label>
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control file-amount">Choose File</div>
                                    <input type="hidden" name="image" value="{{ get_settings('agents_page_advertiment_1') }}"  class="selected-files" >
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>  
                            <div class="form-group">
                                <label>Link</label>
                                <input type="text" class="form-control" name="link" value="{{ get_settings('agents_page_link_1') }}"/>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" rows="4">{{ get_settings('agents_page_description_1') }}</textarea>
                            </div>
                            <div class="mt-4" align="right">
                                <input type="submit" class="btn btn-success" value="Update">
                            </div>
                    </form>
                    
                </div>
            </div>
            <div class="tab-pane fade" id="ad2">
                <div class="card-body">
                <form action="{{route('admin.agents_page_ad.update2')}}" method="post" enctype="multipart/form-data">                    
                        {{csrf_field()}}
                            
                            <div class="form-group">
                                <label>Image <span class="text-danger">*</span></label>
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control file-amount">Choose File</div>
                                    <input type="hidden" name="image" value="{{ get_settings('agents_page_advertiment_2') }}"  class="selected-files" >
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>  
                            <div class="form-group">
                                <label>Link</label>
                                <input type="text" class="form-control" name="link" value="{{ get_settings('agents_page_link_2') }}"/>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" rows="4">{{ get_settings('agents_page_description_2') }}</textarea>
                            </div>
                            <div class="mt-4" align="right">
                                <input type="submit" class="btn btn-success" value="Update">
                            </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="info">
                <div class="card-body">
                    <form action="{{route('admin.agents_page_ad.update3')}}" method="post" enctype="multipart/form-data">                    
                        {{csrf_field()}}
                            
                            <div class="form-group">
                                <label>Image <span class="text-danger">*</span></label>
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control file-amount">Choose File</div>
                                    <input type="hidden" name="image" value="{{ get_settings('agents_page_advertiment_3') }}"  class="selected-files" >
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>  
                            <div class="form-group">
                                <label>Link</label>
                                <input type="text" class="form-control" name="link" value="{{ get_settings('agents_page_link_3') }}"/>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" rows="4">{{ get_settings('agents_page_description_3') }}</textarea>
                            </div>
                            <div class="mt-4" align="right">
                                <input type="submit" class="btn btn-success" value="Update">
                            </div>
                    </form>
                </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>

 
  </div>



@endsection
