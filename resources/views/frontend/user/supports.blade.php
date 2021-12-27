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
                                    <h4 class="fs-4 fw-bolder user-settings-head">Help and Supports</h4>
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
                                                <th scope="col">User Name</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Actions</th>
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



    <!-- Modal delete -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="ModalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form name="importform" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-header">
                        <h3 class="modal-title" id="ModalDeleteLabel">Delete</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <!-- <span aria-hidden="true">&times;</span> -->
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <h5>Are you sure you want to remove this?</h5>
                        </div>                        

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" name="ok_button" id="ok_button">Delete</button>
                       
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection


@push('after-scripts')

<script>
    function loadTable() {
        var table = $('#villadatatable').DataTable({
            processing: true,
            ajax: "{{route('frontend.user.get-supports')}}",
            serverSide: true,
            responsive: true,
            autoWidth: true,
            order: [[0, "desc"]],
            columns: [
                {data: 'name', name: 'name'},
                {data: 'title', name: 'title'},
                {data: 'status', name: 'status'},
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

    var user_id;

    $(document).on('click', '.delete', function(){
        user_id = $(this).attr('id');
        $('#confirmModal').modal('show');
    });

        $('#ok_button').click(function(){

        $.ajax({
            url:"area-management/supports/delete/"+user_id,            
            success:function(data)
            {
                setTimeout(function(){
                    $('#confirmModal').modal('hide');
                    $('#villadatatable').DataTable().ajax.reload();
                });
            }
        })
    });
</script>

@endpush

