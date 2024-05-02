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
                                        <h3 class="card-title">Create Parameter <small></small></h3>
                                    </div>
                                    <div class="col-sm-6 text-white">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item">Edit Parameter</li>
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
                            <form id="quickForm" action="{{ route('admin.parameters.create') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Parameter Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Parameter Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="main_heading">Main Heading</label>
                                        <input type="text" name="main_heading" class="form-control" id="main_heading"
                                            placeholder="Main Heading">
                                    </div>
                                    <div class="form-group">
                                        <label for="sub_heading">Sub Heading</label>
                                        <input type="text" name="sub_heading" class="form-control" id="sub_heading"
                                            placeholder="Sub Heading">
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <textarea class="form-control" name="content" id="content" cols="30" rows="5"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="link">link</label>
                                        <input type="text" name="link" class="form-control" id="link"
                                            placeholder="link">
                                    </div>
                                    <div class="form-group">
                                        <label for="image_src">Image</label>
                                        <input type="file" name="image_src" class="form-control" id="image_src"
                                            placeholder="Image">
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Parent</label>
                                        <select name="parent_id" class="form-control" id="parent_id">
                                            <option  value="" style="display:none">---Select and option----</option>
                                            @foreach ($parameters as $parameterId => $parameterName)
                                                <option value="{{ $parameterId }}">{{ $parameterName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div id="selected-categories" style="display: flex;">

                                    </div> --}}
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control" id="status">
                                            @foreach($statuses as $status)
                                            <option value="{{$status->value}}">{{$status->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
