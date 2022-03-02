@extends('layouts.admin.index')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Customers</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            @include('layouts.admin.messages')
            <table class="table table-stripped table-bordered datatable" id="datatable" style="z-index: 3; width: 100% !important;">
                <thead>
                <tr role="row" class="bg-secondary white">
                    <th class="border-darken-1">S. No.</th>
                    <th class="border-darken-1">Name</th>
                    <th class="border-darken-1">Email</th>
                    <th class="border-darken-1">City</th>
                    <th class="border-darken-1">Company</th>
                    <th class="border-darken-1">Address</th>
                    <th class="border-darken-1">Country</th>
                    <th class="border-darken-1">Phone</th>
                    <th class="border-darken-1">Details</th>
                    <th class="border-darken-1">Status</th>
                    <th class="border-darken-1"></th>
                </tr>
                </thead>
            </table>
        </div>

        <div class="modal fade" id="details" role="dialog" aria-labelledby="details" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="adjusted_shipments_title">Contact Detail(s)</h4>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <table id="detail_table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Designation</th>
                                    <th>Phone</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/datatables-fixedheader/css/fixedHeader.bootstrap4.css')}}">
@endsection

@section('scripts')

    <script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.js')}}"></script>
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.js')}}"></script>
    <script src="{{asset('plugins/datatables-fixedheader/js/fixedHeader.bootstrap4.js')}}"></script>
    <script src="{{asset('plugins/datatables-fixedheader/js/dataTables.fixedHeader.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            var table = $('#datatable').DataTable({
                dom: '<"d-inline-block"l><"pull-right"B>tipr',
                scrollX: false, scrollY: '400px',
                lengthMenu: [[50, 100, 500, 1000, -1], [50, 100, 500, 1000, 'All']],
                pageLength: 50,
                pagingType: 'full_numbers',
                processing: true,
                buttons: [
                    //
                ],
                ajax: {
                    url: '{{ route('admin.customers.list') }}'
                },
                rowId: 'id',
                order: [1, 'desc'],

                serverSide: true,
                columns: [
                    {data: 'serial_number', orderable: false, searchable: false, name: 'serial_number', class: 'align-middle serial_number', targets: 0, render: function (data, type, row) {return '';}},
                    {data: 'user_name', name:"users.name",  class: 'align-middle user_name'},
                    {data: 'user_email', name:"users.email", class: 'align-middle user_email'},
                    {data: 'city', name:"c.id", class: 'align-middle city'},
                    {data: 'company', name:"users.company_name", class: 'align-middle company'},
                    {data: 'address', name:"address", class: 'align-middle address'},
                    {data: 'country', name:"country", class: 'align-middle country'},
                    {data: 'user_phone', name:"users.phone", class: 'align-middle user_phone'},
                    {data: 'details', name:"details", class: 'text-center details'},
                    {data: 'status_id', name:"status_id", class: 'text-center status_id',orderable:false},
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
                    var city_select = '<select name="city_select" id="city_select" class="select2 form-control">' +
                        '</select>';

                    this.api().columns().every(function(column_id) {
                        var column = this;
                        var header = column.header();

                        if ($(header).is('.serial_number') || $(header).is('.action')) {
                            $(td).appendTo($(search));
                        }
                        else if($(header).is('.city')) {
                            $(city_select).appendTo($(search))
                                .on('change', function () {
                                    column.search($(this).val(), false, false, true);
                                }).wrap(td);
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
                    var data = $.map({!! $cities !!}, function (obj) {
                        obj.id = obj.id // replace pk with your identifier
                        obj.text = obj.name;
                        return obj;
                    });

                    $("#city_select").prepend('<option value="" selected></option>').select2({
                        data:data,
                        placeholder: "Select Status",
                        width:'100%',
                        containerCssClass: 'select-xs p-1',
                    });
                    this.api().table().columns.adjust();
                }
            });

            $('#datatable tbody').on('click', 'tr td.details button', function() {
                var id = parseInt($(this).parents('tr').attr('id'));
               if(id){

                 $.ajax({
                     url: '{!! route('admin.customers.details') !!}',
                method: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': id
                }
                })
                    .done(function(data) {
                        if (data) {

                            $.each(data, function(index, tracking_number) {
                                tracking_numbers += '<u><a href='+route+'?tracking_number='+tracking_number+' target="_blank">'+tracking_number+'</a></u><br>';
                            });

                            $('#adjusted_shipments .modal-body').html(tracking_numbers);

                            $('#adjusted_shipments').modal('show');
                        }
                    });
               }
            });

        });
    </script>
@endsection


