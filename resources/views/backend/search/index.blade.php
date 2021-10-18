@extends('backend.layouts.app')

@section('title', __('Search'))

@section('content')
    

<div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <strong>Search&nbsp;</strong>

                </div><!--card-header-->

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="villadatatable" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Keyword</th>
                                <th scope="col">Filters</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

    <!-- Modal edit -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <span id="form_result"></span>
              
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search Information</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                            <!-- <span aria-hidden="true">&times;</span> -->
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row pe-0">                                            
                                            
                            <div class="col-12">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td width="11%" style="font-weight: 600;">Keyword:</td>
                                            <td><input type="text" class="ml-2" id="keyword" style="border: none; border-color: transparent; background-color:white" disabled /></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: 600;">Filters:</td>
                                            <td><input type="text" class="ml-2" id="filters" style="border: none; border-color: transparent; background-color:white" disabled /></td>
                                        </tr>
                                        <tr>
                                            <td  style="font-weight: 600;">Result:</td>
                                            <td><textarea class="form-control" id="result" style="border: none; border-color: transparent; background-color:white" rows="3" disabled></textarea></td>
                                        </tr>
                                                        
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- <input type="submit" class="btn btn-success" name="action_button" id="action_button" value="Update"> -->
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
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                            <!-- <span aria-hidden="true">&times;</span> -->
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <h5>Are you sure you want to remove this?</h5>
                        </div>                        

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" name="ok_button" id="ok_button">Delete</button>
                       
                    </div>
                </form>

            </div>
        </div>
    </div>
    

    <script type="text/javascript">
        $(function () {
            var table = $('#villadatatable').DataTable({
                processing: true,
                ajax: "{{route('admin.search.getdetails')}}",
                serverSide: true,
                order: [[0, "desc"]],
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'keyword', name: 'keyword'},
                    {data: 'filters', name: 'filters'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $(document).on('click', '.edit', function(){

            var user_id;

            var user_id = $(this).attr('id');
            $('#form_result').html('');
            $.ajax({
            url :"search/show/"+user_id,

            dataType:"json",
            success:function(data)
            {
                $('#keyword').val(data.result.keyword);
                $('#filters').val(data.result.filters);
                $('#result').val(data.result.result);
                $('#editModal').modal('show');
            }
            })
            });
            
            var user_id;

            $(document).on('click', '.delete', function(){
            user_id = $(this).attr('id');
            $('#confirmModal').modal('show');
            });

            $('#ok_button').click(function(){
            $.ajax({
            url:"search/delete/"+user_id,
            
            success:function(data)
            {
                setTimeout(function(){
                $('#confirmModal').modal('hide');
                $('#villadatatable').DataTable().ajax.reload();
                });
            }
            })
            });

          
        });
    </script>



@endsection
