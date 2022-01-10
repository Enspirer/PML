@extends('frontend.layouts.app')

@section('title', 'Saved Search History')

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ url('css/profile-settings.css') }}">
@endpush

<div style="background: #e8eeef;">
        <div class="container user-settings" style="margin-top:6rem;">
            <div class="row justify-content-between">
                <div class="col-4 left col-xs-12" style="background-color: #E8EEEF">
                    <div class="row">
                        <div class="col-12">
                            @include('frontend.includes.profile-settings-links')
                        </div>
                    </div>
                </div>

                <div class="col-8 ps-4 right pb-5 col-xs-12" style="padding-top: 3rem; background-color: #F5F9FA">                    

                    <div class="row justify-content-between mb-4">
                        <div class="col-12 p-0">
                            <div class="row align-items-center">
                                <div class="col-6 ps-4">
                                    <h4 class="fs-4 fw-bolder user-settings-head">Saved Search History</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="px-2" id="nav-agent" role="tabpanel" aria-labelledby="nav-agent-tab">
                                <div class="row align-items-center justify-content-between mb-4 border py-3">
                                    
                                    <table class="table table-responsive" id="villadatatable" style="width:100%">
                                        <thead class="table-head">
                                            <tr>
                                                <th width="100%" scope="col">Date</th>
                                                <th width="100%" scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="align-middle table-data">

                                        </tbody>
                                    </table>                                
                                    
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
    function loadTable() {
        var table = $('#villadatatable').DataTable({
            processing: true,
            ajax: "{{route('frontend.user.search_history_get_details')}}",
            serverSide: true,
            responsive: true,
            autoWidth: true,
            order: [[0, "desc"]],
            columns: [
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            "fnDrawCallback": function( oSettings ) {
                dispprove();
            }
        });
    };


    $(document).ready(function() {
        loadTable();
    });

    function dispprove() {
        $('.disapprove').on('click', function() {
        let value = $(this).attr('id');

        $('.modal-footer input').attr('value', value);
    })
    }
</script>

@endpush