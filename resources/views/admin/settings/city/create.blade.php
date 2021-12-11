@extends('layouts.admin.index')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create City</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            @include('layouts.admin.messages')
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <form action="{{route('settings.city.store')}}" id="city_form" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="city_name" class="form-control" placeholder="Add City" data-rule-required="true" data-msg-required="City is required">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary border border-secondary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>

@endsection


@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/sweetalert2/sweetalert2.css')}}">
@endsection


@section('scripts')
    <script src="{{asset('plugins/jquery-validation/jquery.validate.js')}}"></script>
    <script src="{{asset('plugins/sweetalert2/sweetalert2.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
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
                        icon: 'info',
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


