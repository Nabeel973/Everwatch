@extends('layouts.admin.index')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profile</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            @include('layouts.admin.messages')

            <div class="row justify-content-center" style="margin-bottom: 40px;">
                <img src="{{ $admin->image()}}" height="150px">
            </div>
            <form id="profile_form" method="post" action="{{route('admin.settings.profile.update')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="admin_id" value="{{$admin->id}}">
                <div class="row mb-3 justify-content-center">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-6 form-group">
                        <input type="text" class="form-control" id="name" name="admin_name" placeholder="Name" data-rule-required="true" data-msg-required="Name is required" value="{{$admin->name}}">
                    </div>
                </div>
                <div class="row mb-3 justify-content-center">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-6 form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" data-rule-required="true" data-msg-required="Email is required" value="{{$admin->email}}">
                    </div>
                </div>
                <div class="row mb-3 justify-content-center">
                    <label for="email" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-6 form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" data-rule-required="true" data-msg-required="Password is required">
                    </div>
                </div>
                <div class="row mb-3 justify-content-center">
                    <label for="email" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-6 form-group">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" data-rule-required="true" data-msg-required="Confirm Password is required">
                    </div>
                </div>
                <div class="row mb-3 justify-content-center">
                    <label for="email" class="col-sm-2 col-form-label">Upload Image</label>
                    <div class="col-sm-6 form-group">
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-sm-4 offset-sm-2">
                        <button type="submit" class="btn btn-success border border-secondary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </section>


@endsection


@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/select2/css/select2.min.css')}}">
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.css')}}">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/sweetalert2/sweetalert2.css')}}">



@endsection

@section('scripts')

    <script src="{{asset('plugins/jquery-validation/jquery.validate.js')}}"></script>


    <script type="text/javascript">
        $(document).ready(function() {

            $("#profile_form").validate({
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
                        text: 'Profile is being updated!',
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


