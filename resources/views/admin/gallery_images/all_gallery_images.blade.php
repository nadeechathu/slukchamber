@extends('admin.layouts.app')

@section('content')
    <section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary mt-3">
                            <div class="card-header content-header">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3 class="card-title">Gallery Images<small></small></h3>

                                    </div>
                                    <div class="col-sm-6 text-white">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item">Gallery Image</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    @include('admin.common.alerts')
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-end mt-1">
{{--                                    @include('admin.gallery_images.components.filters')--}}
                                    @can('create-gallery-images')
{{--                                        @include('admin.gallery_images.gallery_images.create_gallery_image')--}}
                                        <a href="{{ route('admin.gallery-images.new') }}" class="btn btn-dark mx-2">
                                            <i class="fa fa-plus"></i> Create Gallery Image
                                        </a>
                                    @endcan
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Image</th>
                                            <th>Alt Text</th>
                                            <th>Caption</th>
                                            <th class="w-25 text-end">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    @if(sizeof($gallery_images) > 0)
                                        @foreach ($gallery_images as $key => $gallery_image)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td><img src="{{ asset($gallery_image->image_src) }}" width="100" alt="Image Src"></td>
                                                <td>{{ $gallery_image->alt_text }}</td>
                                                <td>{{ $gallery_image->caption }}</td>
                                                <td class="text-end">

                                                    @can('edit-gallery-images')
                                                        <a href="{{ route('admin.gallery-images.edit', $gallery_image->id) }}" class="btn btn-sm btn-warning">
                                                            <i class="fa fa-edit fa-sm"></i>
                                                        </a>

                                                    @endcan
                                                    @can('delete-gallery-images')
                                                        @include('admin.gallery_images.components.remove_gallery_image')
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="text-center" colspan="6">No Records Found</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </section>
@endsection
