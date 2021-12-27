@extends('frontend.layouts.app')

@section('title', 'Help and Supports')

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ url('css/profile-settings.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endpush

<div style="background: #e8eeef;">
        <div class="container user-settings" style="margin-top:6rem;">
            <div class="row justify-content-between">
                <div class="col-4 left" style="background-color: #E8EEEF">
                    <div class="row">
                        <div class="col-12">
                            @include('frontend.includes.profile-settings-links')
                        </div>
                    </div>
                </div>

                <div class="col-8 ps-4 right pb-5" style="padding-top: 3rem; background-color: #F5F9FA">                    

                    <div class="row justify-content-between mb-4">
                        <div class="col-12 p-0">
                            <div class="row align-items-center">
                                <div class="col-6 ps-4">
                                    <h4 class="fs-4 mb-3 fw-bolder user-settings-head">Help and Supports</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="px-2" id="nav-agent" role="tabpanel" aria-labelledby="nav-agent-tab">
                                <div class="row align-items-center justify-content-between mb-4 border py-3">

                                    <div class="col-12">
                                        <div class="row align-items-center justify-content-between">
                                            <div class="col-4">
                                                <h6 class="mb-0">User Name : {{ $supports->name }}</h6>
                                            </div>
                                            <div class="col-4 text-end">
                                                <p class="mb-0">{{ $supports->created_at->toDateString() }}</p>
                                            </div> 
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-11 mb-2">
                                            <div class="row align-items-center justify-content-between">
                                                <p class="mt-3" style="font-size: 20px"><b>{{ $supports->title }}</b></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-11 mt-3">
                                            <div class="row align-items-center justify-content-between p-2 border rounded">
                                                <p>{{ $supports->message }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <form action="{{ route('frontend.user.supports.update') }}" method="POST">
                                    {{csrf_field()}}

                                        <div class="mt-5 text-center mb-5">
                                            <input type="hidden" class="form-control action_value" value="" name="action">
                                            <input type="hidden" class="form-control" value="{{ $supports->id }}" name="hid_id">
                                            <button type="submit" class="btn rounded-pill text-light px-4 py-2 me-2 btn-success Solved">Solved</button>
                                            <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-danger Not_Solved">Not Solved</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div> 

                </div>

            </div>
        </div>
    </div> 

@endsection

@push('after-scripts')


<script>
    $('.Solved').click(function() {
    $('.action_value').val('Solved');
    })

    $('.Not_Solved').click(function() {
    $('.action_value').val('Not Solved');
    })
</script>



@endpush


