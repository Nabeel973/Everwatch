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
            <table class="table table-stripped table-bordered datatable" id="datatable" style="z-index: 3;">
                <thead>
                <tr role="row" class="bg-primary white">
                    <th class="border-primary border-darken-1">S. No.</th>
                    <th class="border-primary border-darken-1">Name</th>
                    <th class="border-primary border-darken-1">Status</th>
                    <th class="border-primary border-darken-1">Created By</th>
                </tr>
                </thead>
            </table>
        </div>
    </section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>
@endsection


