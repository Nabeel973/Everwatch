@extends('layouts.admin.index')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Cities</h1>
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
                    <th class="border-darken-1">Name</th>
                    <th class="border-darken-1">Details</th>
                    <th class="border-darken-1">Status</th>
                    <th class="border-darken-1"></th>
                </tr>
                </thead>
            </table>
        </div>
    </section>

    <div class="modal fade" id="add_city_modal" role="dialog" aria-labelledby="add_city_modal" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="add_city_title">Add City</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('admin.settings.city.store')}}" id="city_form" method="post">
                            @csrf
                            <div class="form-group">
                                <label>City Name</label>
                                <input type="text" name="city_name" id="city_name" class="form-control" placeholder="Add City" data-rule-required="true" data-msg-required="City is required">
                            </div>
                            <div class="form-group">
                                <label>City Code</label>
                                <input type="text" name="city_code" id="city_code" class="form-control" placeholder="City Code" data-rule-required="true" data-msg-required="Code is required">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" id="status" class="form-control select2 p-1" style="width: 100%;text-align: left; " data-rule-required="true" data-msg-required="Status is required">
                                    <option value="1">Enable</option>
                                    <option value="2">Disable</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Details</label>
                                <input type="text" name="city_details" id="city_details" class="form-control" placeholder="Add Details">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success border border-secondary">Submit</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit_city_modal" role="dialog" aria-labelledby="edit_city_title" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="edit_title">Edit City</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" id="edit_city_form" method="post">
                        @csrf
                        <div class="form-group">
                            <label>City Name</label>
                            <input type="text" name="edit_city_name" id="edit_city_name" class="form-control" placeholder="Edit City" data-rule-required="true" data-msg-required="City is required">
                        </div>
                        <div class="form-group">
                            <label>City Code</label>
                            <input type="text" name="edit_city_code" id="edit_city_code" class="form-control" placeholder="Edit City Code" data-rule-required="true" data-msg-required="Code is required">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="edit_status" id="edit_status" class="form-control select2 p-1" style="width: 100%;text-align: left; " data-rule-required="true" data-msg-required="Status is required">
                                <option value="1">Enable</option>
                                <option value="2">Disable</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Details</label>
                            <input type="text" name="edit_city_details" id="edit_city_details" class="form-control" placeholder="Add Details">
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

   {{-- <script src="{{asset('plugins/datatables-buttons/js/buttons.print.js')}}"></script>
--}}
    <script type="text/javascript">
        $(document).ready(function() {

            $('#status').prepend('<option value="" selected="selected"></option>').select2({
                placeholder:'Select Status',
                width:'100%',
                containerCssClass: 'p-1',
                dropdownParent: $("#city_form")
            });

            $('#edit_status').select2({
                placeholder:'Select Status',
                width:'100%',
                containerCssClass: 'p-1',
                dropdownParent: $("#edit_city_form")
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
                            $('#add_city_modal').modal('show');
                        }
                    },
                    {
                        extend: 'excel',
                        title: 'Cargo Manifest Mapping',
                        className:'btn btn-primary',
                        text: '<i class="la la-file-excel-o"></i> Excel',
                    }
                ],
                ajax: {
                    url: '{{ route('admin.settings.city.list') }}'
                },
                rowId: 'id',
                order: [1, 'desc'],
              /*  language: {
                    processing: data_table_loader
                },*/
                serverSide: true,
                columns: [
                    {data: 'serial_number', orderable: false, searchable: false, name: 'serial_number', class: 'align-middle serial_number', targets: 0, render: function (data, type, row) {return '';}},
                    {data: 'name', name:"name",  class: 'align-middle name'},
                    {data: 'details', name:"details", class: 'align-middle details'},
                    {data: 'status', name:"status", class: 'align-middle status'},
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
                var city_id = table.row( $(this).parents('tr') ).data().id;

                if ($(this).hasClass('edit_city')) {
                    $.ajax({
                        url: '{!! route('admin.settings.city.edit') !!}',
                        method: 'POST',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'city_id': city_id
                        }
                    }).done(function(data){
                        if(data){
                            var city = data.name;
                            var code = data.code;
                            var status = data.status;
                            var detail = data.details;

                            console.log(status);

                            $('#edit_city_name').val(city);
                            $('#edit_city_code').val(code);
                            $('#edit_status').val(status).trigger('change');
                            $('#edit_city_details').val(detail);
                            $('#edit_city_modal').modal('show');

                            var route = '{!! route('admin.settings.city.update', ':id') !!}';
                            route = route.replace(':id', city_id);
                            $("#edit_city_form").attr('action', route);
                        }
                    });

                }
            });

            $( "#city_form" ).validate({
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
                        text: 'Your City is being created!',
                        icon: 'success',
                        buttons: false,
                        closeOnClickOutside: false,
                        closeOnEsc: false
                    });

                    form.submit();
                }
            });

            $( "#edit_city_form" ).validate({
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
                        text: 'City is being updated!',
                        icon: 'success',
                        buttons: false,
                        closeOnClickOutside: false,
                        closeOnEsc: false
                    });

                    form.submit();
                }
            });

            $('#add_city_modal').on('hide.bs.modal', function () {
                $('#city_form #city_name').val('');
                $('#city_form #city_code').val('');
                $('#city_form #city_details').val('');
                $('#status').val('').trigger('change');
            });

        });
    </script>
@endsection


