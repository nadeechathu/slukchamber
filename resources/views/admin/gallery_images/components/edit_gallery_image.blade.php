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
                                        <h3 class="card-title">Update Gallery Image <small></small></h3>
                                    </div>
                                    <div class="col-sm-6 text-white">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item">Administrator Dashboard</li>
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
                            <form id="quickForm" action="{{ route('admin.gallery-images.update', ['id' => $gallery_image->id]) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                        <div class="mb-3">
                                            <img src="{{ asset($gallery_image->image_src) }}" alt="Image Src"
                                                 class="img-fluid selected-image" width="180">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="image_src">Image Src</label>
                                                    <input type="file" name="image_src" class="form-control"
                                                           id="image_src" placeholder="Image Src"
                                                           onchange="previewImage(this)">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alt_text">Alt Text</label>
                                        <input type="text" name="alt_text" class="form-control" id="alt_text"
                                               value="{{ $gallery_image->alt_text }}" placeholder="Alt Text">
                                    </div>

                                    <div class="form-group ">
                                        <label for="caption">Caption</label>
                                        <input type="text" name="caption" class="form-control" id="caption"
                                               value="{{ $gallery_image->caption }}" placeholder="Caption">
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
