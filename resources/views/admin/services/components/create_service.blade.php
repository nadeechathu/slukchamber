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
                                        <h3 class="card-title">Create Service <small></small></h3>
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

                            <form id="quickForm" action="{{ route('admin.services.create') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}"
                                            placeholder="Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="short-description">Short Description</label>
                                        <textarea name="short_description" class="form-control" id="short-description" cols="30"
                                            placeholder="Short Description" rows="4">{{ old('short_description') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control" id="description" cols="30" placeholder="Description"
                                            rows="4">{{ old('description') }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="slug">Slug</label>
                                                <input type="text" name="slug" class="form-control" id="slug"  value="{{ old('slug') }}"
                                                    placeholder="Slug">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="keywords">Keywords</label>
                                                <input type="text" name="keywords" class="form-control" id="keywords"  value="{{ old('keywords') }}"
                                                    placeholder="Keywords">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta-title">Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control" id="meta-title"  value="{{ old('meta_title') }}"
                                            placeholder="Meta Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta-description">Meta Description</label>
                                        <textarea name="meta_description" class="form-control" id="meta-description" cols="30"
                                            placeholder="Meta Description" rows="4">{{ old('meta_description') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="canonical-url">Canonical Url</label>
                                        <input type="text" name="canonical_url" class="form-control" id="canonical-url"  value="{{ old('canonical_url') }}"
                                            placeholder="Canonical Url">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="banner-image">Banner Image</label>
                                                <input type="file" name="banner_image" class="form-control"
                                                    id="banner-image" placeholder="Published Date">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select name="status" class="form-control" id="status">
                                                    @foreach($statuses as $status)
                                                    <option value="{{$status->value}}">{{$status->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
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
