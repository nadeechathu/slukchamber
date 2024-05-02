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
                                        <h3 class="card-title">Edit Parameter <small></small></h3>
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

                            <form id="quickForm" action="{{ route('admin.parameters.update', ['id' => $parameter->id]) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Parameter Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            value="{{ $parameter->name }}" placeholder="Parameter Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="main_heading">Main Heading</label>
                                        <input type="text" name="main_heading" class="form-control" value="{{$parameter->main_heading}}" id="main_heading"
                                            placeholder="Main Heading">
                                    </div>
                                    <div class="form-group">
                                        <label for="sub_heading">Sub Heading</label>
                                        <input type="text" name="sub_heading" class="form-control" value="{{$parameter->sub_heading}}" id="sub_heading"
                                            placeholder="Sub Heading">
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <textarea name="content" class="form-control" id="content" cols="30" rows="5">{{$parameter->content}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="link">link</label>
                                        <input type="text" name="link" class="form-control" id="link"
                                            value="{{ $parameter->link }}" placeholder="link">
                                    </div>
                                    <div class="mb-3">
                                        @isset($parameter->image_src)
                                            <img src="{{ asset($parameter->image_src) }}" alt="Service Image"
                                                class="img-fluid selected-image" width="180">
                                        @else
                                            No Image Available
                                        @endisset
                                    </div>
                                    <div class="form-group">
                                        <label for="image_src">Image</label>
                                        <input type="file" name="image_src" class="form-control" id="image_src"
                                            placeholder="Image" onchange="previewImage(this)">
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Parent</label>
                                        <select name="parent_id" class="form-control" id="parent_id">
                                            <option value="">---Select an option---</option>
                                            @foreach ($parameters as $parameterId => $parameterName)
                                                @if ($parameterId != $parameter->id)
                                                    <option value="{{ $parameterId }}"
                                                            @if ($parameterId == $parameter->parent_id) selected @endif>
                                                        {{ $parameterName }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div id="selected-categories" style="display: flex;">

                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control" id="status">
                                            @foreach($statuses as $status)
                                            <option {{ $status->value == $parameter->status ? 'selected' : ''}} value="{{$status->value}}">{{$status->name}}</option>
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
