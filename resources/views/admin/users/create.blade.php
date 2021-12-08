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
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <p class="border-bottom text-center text-bold">Customer</p>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <p class="border-bottom text-center text-bold">Other Details</p>
                </div>
            </div>
        </div>
    </section>

@endsection

{{--<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>--}}
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>
@endsection


