@extends('admin.layouts.app')

@section('content')
<section>



    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary mt-3">
                        <div class="card-header content-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3 class="card-title">Create Staff Member <small></small></h3>
                                </div>
                                <div class="col-sm-6 text-white">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item">Create Staff Member</li>
                                    </ol>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                @include('admin.common.alerts')
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" action="{{ route('admin.director_board.create') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">Name</label>
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">Designation</label>
                                            <input type="text" name="designation" class="form-control" id="designation" placeholder="Designation" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">Email</label>
                                            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" id="description" cols="30" placeholder="Description" rows="4"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control" id="status">
                                        @foreach($statuses as $status)
                                            <option value="{{$status->value}}">{{$status->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="banner-image">Profile Image</label>
                                    <input type="file" name="image" class="form-control" id="image" placeholder="Published Date" required>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>

        </div>
    </section>

</section>

@endsection

@section('scripts')
    <script>
        $( document ).ready(function() {
            $("#inputTag").tagsinput('items');
        });
    </script>
@endsection
