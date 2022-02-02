@extends('layouts.admin.index')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Customers</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <form id="customer_form" method="post" action="{{route('admin.customers.submit')}}">
            @csrf
            <div class="row mb-4">
                <div class="col">
                    <div class="form-group">
                        <p class="border-bottom text-center text-bold">Customer</p>
                    </div>
                    <div class="row mb-2 ">
                       <div class="col-4 text-center">
                            <label>User Name</label>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter User Name" data-rule-required="true" data-msg-required="User Name is required">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4 text-center">
                            <label>Password</label>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" data-rule-required="true" data-msg-required="Password is required">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4 text-center">
                            <label>Re-enter Password</label>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input type="password" name="pwd_confirmation" id="pwd_confirmation" class="form-control" placeholder="Re-enter Password" data-rule-required="true" data-msg-required="Password is required">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4 text-center">
                            <label>Company</label>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input type="text" name="company" id="company" class="form-control" placeholder="Enter Company Name" data-rule-required="true" data-msg-required="Company Name is required">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4 text-center">
                            <label>City</label>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <select name="city_id" id="city_id" class="form-control select2" required data-rule-required="true" data-msg-required="This field is required">
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <p class="border-bottom text-center text-bold">Other Details</p>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4 text-center">
                            <label>Full Address</label>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address" data-rule-required="true" data-msg-required="Address is required">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4 text-center">
                            <label>Country</label>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input type="text" name="country" id="country" class="form-control" placeholder="Enter Country Name" data-rule-required="true" data-msg-required="Country Name is required">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4 text-center">
                            <label>Phone</label>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Phone" data-rule-required="true" data-msg-required="Phone number is required">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4 text-center">
                            <label>Email</label>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email Address" data-rule-required="true" data-msg-required="Email is required">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4 text-center">
                            <label>Status</label>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <select name="status_id" id="status_id" class="form-control select2" required data-rule-required="true" data-msg-required="This field is required">
                                    <option value="1">Active</option>
                                    <option value="2">Not Active</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row border-bottom justify-content-center" style="margin: 3rem !important;">
                <h2>Contacts</h2>
            </div>
            <div class="row justify-content-center mb-5" id="new_div" style="margin:3rem !important;">
                <table class="table table-bordered mb-5" id="dynamic_field">
                    <tr>
                        <td><div class="form-group"><input type="text" name="addmore[0][add_name]" id="add_name" placeholder="Name*" class="form-control name_list"  data-rule-required="true" data-msg-required="Name is required" /></div></td>
                                                <td><div class="form-group"><input type="text" name="addmore[0][add_designation]" id="add_designation" placeholder="Designation*" class="form-control"  data-rule-required="true" data-msg-required="Designation is required" /></div></td>
                                                <td><div class="form-group"><input type="text" name="addmore[0][add_phone]" id="add_phone" placeholder="Phone*" class="form-control"  data-rule-required="true" data-msg-required="Phone is required" /></div></td>
                        <td><div class="form-group"><input type="email" name="addmore[0][email]" id="add_email" placeholder="Email*" class="form-control"  data-rule-required="true" data-msg-required="Email is required" /></div></td>
                                                <td class="text-center"><button type="button" name="add" id="add" class="btn btn-success">Add </button></td>
                    </tr>
                </table>
            </div>
            <div class="row button_div justify-content-center">
                <div class="form-group mb-5">
                    <button type="submit" class="btn btn-success" id="form_btn">Submit</button>
                </div>
            </div>
        </form>
    </section>

@endsection


@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/select2/css/select2.min.css')}}">
@endsection

@section('scripts')

    <script src="{{asset('plugins/jquery-validation/jquery.validate.js')}}"></script>
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('plugins/inputmask/jquery.inputmask.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#status_id').prepend('<option value="" selected="selected"></option>').select2({
                placeholder:'Select Status',
                width:'100%',
                containerCssClass: 'p-1',
                dropdownParent: $("#customer_form")
            });

            $('#city_id').prepend('<option value="" selected="selected"></option>').select2({
                placeholder:'Select City',
                width:'100%',
                containerCssClass: 'p-1',
                dropdownParent: $("#customer_form")
            });
            $('#add_phone').inputmask({
                'mask': '9999-9999999',
                'clearIncomplete': true
            });
            $('#phone').inputmask({
                'mask': '9999-9999999',
                'clearIncomplete': true
            });

            var i = 0;
            $('body').on('click','#add',function(){
                ++i;
                $("#dynamic_field").append('<tr> <td><div class="form-group"><input type="text" name="addmore['+i+'][add_name]" id="add_name'+i+'" placeholder="Name*" class="form-control name_list"  data-rule-required="true" data-msg-required="Name is required" /></div></td><td><div class="form-group"><input type="text" name="addmore['+i+'][add_designation]" placeholder="Designation*" class="form-control"  data-rule-required="true" data-msg-required="Designation is required" id="add_designation'+i+'" /></div></td> ' +
                    ' <td><div class="form-group"> <input type="text" name="addmore['+i+'][add_phone]" class="form-control" id="add_phone'+i+'" placeholder="Phone*" data-rule-required="true" data-msg-required="Phone is required"></div></td><td><div class="form-group"> <input type="email" name="addmore['+i+'][add_email]" class="form-control" id="add_email'+i+'" placeholder="Email*" data-rule-required="true" data-msg-required="Email is required"></div></td>' +
                    '<td class="text-center"><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');

                $('#add_phone'+i+'').inputmask({
                    'mask': '9999-9999999',
                    'clearIncomplete': true
                });

               /* $('#leavers_trax_id'+i+'').prepend('<option value="" selected="selected"></option>').select2({
                    width: '100%',
                    placeholder: 'Trax Id*'
                });
                $('#gross_salary'+i+'').inputmask({
                    'alias': 'decimal',
                    'allowMinus': false,
                    'allowPlus': false,
                    'rightAlign': false,
                    'digits': 2,
                });

                var date = $('#append_date'+i+'').pickadate({
                    firstDay: 1,
                    clear: 'Clear',
                    max : new Date(today),
                    format:'dd mmmm, yyyy',
                    selectYears: true,
                    selectMonths: true,
                    formatSubmit: 'yyyy-mm-dd 23:59:59',
                    hiddenSuffix: '_formatted',
                    onOpen: function() {
                        $('.date_root').css('top', '40px');
                        $('.picker').css('position','relative');
                    },
                    onSet: function(context) {

                    }
                });*/
            });

            $(document).on('click', '.remove-tr', function(){
                $(this).parents('tr').remove();
            });

            $( "#customer_form" ).validate({
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
        });
    </script>
@endsection


