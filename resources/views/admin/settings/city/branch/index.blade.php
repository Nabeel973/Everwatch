@extends('layouts.admin.index')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Branches</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            @include('layouts.admin.messages')
            <table class="table table-stripped table-bordered datatable" id="datatable" style="z-index: 3; width: 100% !important;">
                <thead>
                <tr role="row" class="bg-secondary text-center">
                    <th class="border-darken-1">S. No.</th>
                    <th class="border-darken-1">City</th>
                    <th class="border-darken-1">Name</th>
                    <th class="border-darken-1">Details</th>
                    <th class="border-darken-1">Status</th>
                    <th class="border-darken-1"></th>
                </tr>
                </thead>
            </table>
        </div>
    </section>

    <div class="modal fade" id="add_branch_modal" role="dialog" aria-labelledby="add_branch_modal" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="add_city_title">Add Branch</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('settings.city.branch.store')}}" id="branch_form" method="post">
                        @csrf

                        <div class="form-group">
                            <label>Branch Name</label>
                            <input type="text" name="branch_name" id="branch_name" class="form-control" placeholder="Add Branch*" data-rule-required="true" data-msg-required="Branch Name is required">
                        </div>
                        <div class="form-group">
                            <label>Branch Code</label>
                            <input type="text" name="branch_code" id="branch_code" class="form-control" placeholder="Branch Code*" data-rule-required="true" data-msg-required="Branch Code is required">
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <select name="city_id" id="city_id" class="form-control select2 p-1" style="width: 100%;text-align: left; " data-rule-required="true" data-msg-required="City is required">
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" id="status" class="form-control select2 p-1" style="width: 100%;text-align: left; " data-rule-required="true" data-msg-required="Status is required">
                                <option value="1">Enable</option>
                                <option value="0">Disable</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Details</label>
                            <input type="text" name="branch_details" id="branch_details" class="form-control" placeholder="Add Details">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success border border-secondary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit_branch_modal" role="dialog" aria-labelledby="edit_branch_title" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="edit_title">Edit Branch</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" id="edit_branch_form" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Branch Name</label>
                            <input type="text" name="edit_branch_name" id="edit_branch_name" class="form-control" placeholder="Edit Branch Name" data-rule-required="true" data-msg-required="Branch Name is required">
                        </div>
                        <div class="form-group">
                            <label>Branch Code</label>
                            <input type="text" name="edit_branch_code" id="edit_branch_code" class="form-control" placeholder="Edit Branch Code" data-rule-required="true" data-msg-required="Branch Code is required">
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <select name="edit_city_id" id="edit_city_id" class="form-control select2 p-1" style="width: 100%;text-align: left; " data-rule-required="true" data-msg-required="City is required">
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="edit_status" id="edit_status" class="form-control select2 p-1" style="width: 100%;text-align: left; " data-rule-required="true" data-msg-required="Status is required">
                                <option value="1">Enable</option>
                                <option value="0">Disable</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Details</label>
                            <input type="text" name="edit_branch_details" id="edit_branch_details" class="form-control" placeholder="Add Details">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success border border-secondary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



@endsection


@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/select2/css/select2.min.css')}}">
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.css')}}">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/datatables-fixedheader/css/fixedHeader.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/sweetalert2/sweetalert2.css')}}">

    <style>
        .datatable,
        .dataTables_scrollHeadInner,
        .dataTables_scrollBody{
            width:100% !important;
        }

        .add{
            float: right;
        }
    </style>


@endsection

@section('scripts')

    <script src="{{asset('plugins/jquery-validation/jquery.validate.js')}}"></script>
    <script src="{{asset('plugins/sweetalert2/sweetalert2.js')}}"></script>
    <script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.js')}}"></script>
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.js')}}"></script>
    <script src="{{asset('plugins/datatables-fixedheader/js/fixedHeader.bootstrap4.js')}}"></script>
    <script src="{{asset('plugins/datatables-fixedheader/js/dataTables.fixedHeader.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.js')}}"></script>
    <script src="{{asset('plugins/jquery-validation/jquery.validate.js')}}"></script>

    {{-- <script src="{{asset('plugins/datatables-buttons/js/buttons.print.js')}}"></script>
 --}}
    <script type="text/javascript">
        $(document).ready(function() {

            $('#status').prepend('<option value="" selected="selected"></option>').select2({
                placeholder:'Select Status',
                width:'100%',
                containerCssClass: 'p-1',
                dropdownParent: $("#branch_form")
            });

            $('#city_id').prepend('<option value="" selected="selected"></option>').select2({
                placeholder:'Select City',
                width:'100%',
                containerCssClass: 'p-1',
                dropdownParent: $("#branch_form")
            });

            $('#edit_status').select2({
                placeholder:'Select Status',
                width:'100%',
                containerCssClass: 'p-1',
                dropdownParent: $("#edit_branch_form")
            });
            $('#edit_city_id').select2({
                placeholder:'Select City',
                width:'100%',
                containerCssClass: 'p-1',
                dropdownParent: $("#edit_branch_form")
            });


            var table = $('#datatable').DataTable({
                dom: '<"d-inline-block"l><"pull-right"B>tipr',
                scrollX: false, scrollY: '400px',
                lengthMenu: [[50, 100, 500, 1000, -1], [50, 100, 500, 1000, 'All']],
                pageLength: 50,
                pagingType: 'full_numbers',
                processing: true,
                buttons: [

                    {
                        text: '<i class="la la-plus-circle"></i> Add',
                        className: 'btn btn-success add',
                        action: function (e, dt, node, config) {
                            $('#add_branch_modal').modal('show');
                        }
                    },
                    {
                        extend: 'excel',
                        title: 'Cargo Manifest Mapping',
                        className:'btn btn-primary',
                        text: '<i class="la la-file-excel-o"></i> Excel',
                    }
                ],
                /*  language: {
                      processing: data_table_loader
                  },*/
                serverSide: true,
                ajax: {
                    url: '{{ route('settings.city.branch.list') }}'
                },
                rowId: 'id',
                order: [1, 'desc'],
                columns: [
                    {data: 'serial_number', orderable: false, searchable: false, name: 'serial_number', class: 'align-middle serial_number', targets: 0, render: function (data, type, row) {return '';}},
                    {data: 'city', name:"c.name",  class: 'align-middle city'},
                    {data: 'name', name:"branches.name",  class: 'align-middle name'},
                    {data: 'details', name:"branches.details", class: 'align-middle details'},
                    {data: 'status', name:"branches.status", class: 'align-middle status'},
                    {data: 'action', name:"action", class: 'text-center action',orderable:false},
                ],
                rowCallback: function(row, data, index) {
                    var info = table.page.info();

                    $('td:eq(0)', row).html(index + 1 + info.page * info.length);
                },
                initComplete: function() {
                    var search = $('<tr role="row" class="bg-lighten-1 search"></tr>').appendTo(this.api().table().header());

                    var td = '<td style="padding:5px;" class="border-lighten-2"><fieldset class="form-group m-0 position-relative has-icon-right"></fieldset></td>';
                    var input = '<input type="text" class="form-control form-control-sm input-sm primary">';
                    var icon = '<div class="form-control-position primary"><i class="la la-search"></i></div>';
                    var status_select = '<select name="status_select" id="status_select" class="select2 form-control">' +
                        '<option value="0">Disabled</option>' +
                        '<option value="1">Enabled</option>' +
                        '</select>';

                    this.api().columns().every(function(column_id) {
                        var column = this;
                        var header = column.header();

                        if ($(header).is('.serial_number') || $(header).is('.action')|| $(header).is('.junctions')) {
                            $(td).appendTo($(search));
                        }
                        else if($(header).is('.status')){
                            $(status_select).appendTo($(search))
                                .on( 'change', function () {
                                    column.search($(this).val(), false, false, true).draw();
                                } ).wrap(td);
                        }
                        else {
                            var current = $(input).appendTo($(search)).on('change', function() {
                                column.search($(this).val(), false, false, true).draw();
                            }).wrap(td).after(icon);

                            if (column.search()) {
                                current.val(column.search());
                            }
                        }
                    });
                    $("#status_select").prepend('<option value="" selected></option>').select2({
                        placeholder: "Select Status",
                        width:'100%',
                        containerCssClass: 'select-xs p-1',
                        //dropdownCssClass: 'form-control-sm p-0'
                    });
                    this.api().table().columns.adjust();
                }
            });


            $('#datatable tbody').on('click', 'tr td.action .btn-group .dropdown-menu .dropdown-item', function() {
                var branch_id = table.row( $(this).parents('tr') ).data().id;

                if ($(this).hasClass('edit_branch')) {
                    $.ajax({
                        url: '{!! route('settings.city.branch.edit') !!}',
                        method: 'POST',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'branch_id': branch_id
                        }
                    }).done(function(data){
                        if(data){
                            var branch = data.name;
                            var code = data.code;
                            var status = data.status;
                            var detail = data.details;
                            var city_id = data.city;

                            $('#edit_branch_name').val(branch);
                            $('#edit_branch_code').val(code);
                            $('#edit_status').val(status).trigger('change');
                            $('#edit_city_id').val(city_id).trigger('change');
                            $('#edit_branch_details').val(detail);
                            $('#edit_branch_modal').modal('show');

                            var route = '{!! route('settings.city.branch.update', ':id') !!}';
                            route = route.replace(':id', city_id);
                            $("#edit_branch_form").attr('action', route);
                        }
                    });

                }
            });

            $( "#branch_form" ).validate({
                errorClass:"danger",
                normalizer: function(value) {
                    return $.trim(value);
                },
                errorPlacement: function(error, element) {
                    error.addClass('w-100').addClass('text-danger').addClass('text-center').appendTo(element.parent('.form-group'));
                },
                submitHandler: function(form) {
                    $(form).find('button[type=submit]').attr('disabled', 'disabled');

                    swal.fire({
                        title: 'Please Wait!',
                        text: 'Your Branch is being created!',
                        icon: 'success',
                        buttons: false,
                        closeOnClickOutside: false,
                        closeOnEsc: false
                    });

                    form.submit();
                }
            });

            $( "#edit_branch_form" ).validate({
                errorClass:"danger",
                normalizer: function(value) {
                    return $.trim(value);
                },
                errorPlacement: function(error, element) {
                    error.addClass('w-100').addClass('text-danger').addClass('text-center').appendTo(element.parent('.form-group'));
                },
                submitHandler: function(form) {
                    $(form).find('button[type=submit]').attr('disabled', 'disabled');

                    swal.fire({
                        title: 'Please Wait!',
                        text: 'Branch is being updated!',
                        icon: 'success',
                        buttons: false,
                        closeOnClickOutside: false,
                        closeOnEsc: false
                    });

                    form.submit();
                }
            });

            $('#add_branch_modal').on('hide.bs.modal', function () {
                $('#branch_form #branch_name').val('');
                $('#branch_form #branch_code').val('');
                $('#branch_form #branch_details').val('');
                $('#status').val('').trigger('change');
            });

        });
    </script>
@endsection


