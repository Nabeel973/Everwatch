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
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <form action="#" id="city_form" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="city_name" class="form-control" placeholder="Add City">
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

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>
@endsection


