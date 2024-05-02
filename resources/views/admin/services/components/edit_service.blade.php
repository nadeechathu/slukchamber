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
                                        <h3 class="card-title">Edit Service <small></small></h3>
                                    </div>
                                    <div class="col-sm-6 text-white">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item">Services</li>
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

                            <form id="quickForm" action="{{ route('admin.services.update', ['id' => $service->id]) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" class="form-control" id="title"
                                            value="{{ $service->title }}" placeholder="Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="short-description">Short Description</label>
                                        <textarea name="short_description" class="form-control" id="short-description" cols="30"
                                            placeholder="Short Description" rows="4">{{ $service->short_description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control" id="description" cols="30" placeholder="Description"
                                            rows="4">{{ $service->description }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="slug">Slug</label>
                                                <input type="text" name="slug" class="form-control" id="slug"
                                                    value="{{ $service->slug }}" placeholder="Slug">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="keywords">Keywords</label>
                                                <input type="text" name="keywords" class="form-control" id="keywords"
                                                    placeholder="Keywords" value="{{ $service->keywords }}">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta-title">Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control" id="meta-title"
                                            placeholder="Meta Title" value="{{ $service->meta_title }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta-description">Meta Description</label>
                                        <textarea name="meta_description" class="form-control" id="meta-description" cols="30"
                                            placeholder="Meta Description" rows="4">{{ $service->meta_description }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="canonical-url">Canonical Url</label>
                                        <input type="text" name="canonical_url" class="form-control" id="canonical-url"
                                            placeholder="Canonical Url" value="{{ $service->canonical_url }}">
                                    </div>
                                    <div class="mb-3">
                                        <img src="{{ asset($service->service_images->banner_image) }}" alt="Service Image"
                                            class="img-fluid selected-image" width="180">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="banner-image">Banner Image</label>
                                                <input type="file" name="banner_image" class="form-control"
                                                    id="banner-image" placeholder="Select image"
                                                    onchange="previewImage(this)">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select name="status" class="form-control" id="status">
                                                    @foreach($statuses as $status)
                                                    <option {{ $status->value == $service->status ? 'selected' : ''}} value="{{$status->value}}">{{$status->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
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
