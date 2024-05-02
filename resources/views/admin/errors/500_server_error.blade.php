@extends('admin.layouts.app')

@section('content')
<!-- Main content -->
<section class="content my-5 pt-5 text-center">

    <div class="row">
        <div class="col-md-12">
            <h2 class="text-danger error-code">500</h2>
        </div>
        <div class="col-md-12">
            <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Server Error</h3>

            <p>
                Something went wrong. Kindly contact your Administrator.
            </p>

            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('admin.dashboard')}}">
                        <button type="button" name="submit" class="btn btn-dark w-25"><i class="fas fa-home"></i>
                            Go To Home
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="error-page">


        <div class="error-content d-block">

        </div>
    </div>
    <!-- /.error-page -->

</section>
@endsection