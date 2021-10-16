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
            <table class="table table-stripped table-bordered datatable" id="datatable" style="z-index: 3;">
                <thead>
                <tr role="row" class="bg-primary white">
                    <th class="border-primary border-darken-1">S. No.</th>
                    <th class="border-primary border-darken-1">City</th>
                    <th class="border-primary border-darken-1">Designation</th>
                    <th class="border-primary border-darken-1">Name</th>
                </tr>
                </thead>
            </table>
        </div>
    </section>

@endsection

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {

    });
</script>


